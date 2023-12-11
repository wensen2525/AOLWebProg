<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        //
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
        dd($request);
        $purchase = DB::transaction(function () use ($request) {

            // SET PAYMENT DUE
            $payment_due = Carbon::now()->addHours(5);

            $purchase = Purchase::create([
                'user_id' => auth()->user()->name,
                'payment_due' => $payment_due,
            ]);

            $totalProducts = count($request->products);
            
            if($totalProducts > 0){
                for($i = 0 ; $i < $totalProducts;$i++){
                    $product = $request->products[$i];

                    // VALIDATE Stock
                    if ($this->validateStock($product, $request->quantity) == false)
                        return redirect()->route('dashboard')->with('failed', 'This product is sold out!');

                    $purchaseDetail = PurchaseDetail::create([
                        'purchase_id' => $purchase->id,
                        'product_id' => $product->id,
                        'price' => $request->price,
                        'quantity' => $request->quantity,
                        'totalPrice' => $request->totalPrice,
                    ]);
                }
            }

            return $purchase;
        });

        return redirect()->route('payment.create', $purchase);
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
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
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
}
