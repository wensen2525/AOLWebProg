<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('purchases.index', [
            'purchases' => Purchase::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $purchase = DB::transaction(function () use ($request) {

            // SET PAYMENT DUE
            $payment_due = Carbon::now()->addHours(5);

            $purchase = Purchase::create([
                'user_id' => auth()->user()->id,
                'payment_due' => $payment_due,
            ]);
            $totalPricePurchase = 0;
            $count_cart = count($request->input());
            if (isset($request->product)) {
                $product = Product::find($request->product);

                $product->update([
                    'stock' => $product->stock - $request->quantity,
                    'stock_sold' => $product->stock_sold + $request->quantity,
                ]);

                // VALIDATE Stock
                if ($this->validateStock($product, $request->quantity) == false)
                    return redirect()->route('dashboard')->with('failed', 'This product is sold out!');

                $purchaseDetail = PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'totalPrice' => $product->price * $request->quantity,
                ]);

                $totalPricePurchase += $purchaseDetail->totalPrice;
            } else {
                for ($i = 1; $count_cart > 1; $i++) {
                    if (isset($request->$i)) {
                        $cart = Cart::find($request->$i);
                        if (isset($cart)) {

                            $cart->product->update([
                                'stock' => $cart->product->stock - $cart->stock,
                                'stock_sold' => $cart->product->stock_sold + $cart->stock,
                            ]);
                            // dd('save');
                            $purchaseDetail = PurchaseDetail::create([
                                'purchase_id' => $purchase->id,
                                'product_id' => $cart->product->id,
                                'price' => $cart->product->price,
                                'quantity' => $cart->stock,
                                'totalPrice' => $cart->product->price * $cart->stock,
                            ]);

                            $totalPricePurchase += $purchaseDetail->totalPrice;

                            $cart->delete();
                            // dd('save');
                        } else {
                            return redirect()->route('cart')->with('failed', 'Your cart is not found!');
                        }
                        $count_cart -= 1;
                    }
                }
            }

            $purchase->update([
                'totalPrice' => $totalPricePurchase,
            ]);

            return $purchase;
        });

        return redirect()->route('payment', $purchase);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'address_id' => 'required',
            'delivery_type' => 'required|string',
            'payment_type' => 'required|string',
        ]);

        $purchase->update([
            'is_verified' => true,
            'address_id' => $request->address_id,
            'delivery_type' => $request->delivery_type,
            'payment_type' => $request->payment_type
        ]);

        return redirect()->route('purchases.index')->with('success','Pesanan kamu sudah berhasil dibayar!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function validateStock($product, $quantity)
    {
        if ($product->stock >= $quantity) {
            return true;
        } else {
            return false;
        }
    }

    public function checkout(Purchase $purchase)
    {
        // dd($purchase);

        return view('payments.create', [
            'purchase' => $purchase,
            'user' => auth()->user(),
        ]);
    }
}
