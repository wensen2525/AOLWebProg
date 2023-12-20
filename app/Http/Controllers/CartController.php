<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cart',[
            'carts' => Cart::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $cart = $this->checkExists($request);
        // dd($cart);
        if($cart == 'error'){
            return redirect()->back()->with('success','Jumlah produk tidak terdeteksi, silahkan cek kembali jumlah produk yang anda inginkan!');
        }
        else if ($cart == false) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product,
                'stock' => $request->quantity
            ]);
        } else {
            $cart[0]->update([
                'stock' => $cart[0]->stock + $request->quantity
            ]);
        }
        return redirect()->back()->with('success','Produk telah ditambahkan ke keranjang.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function delete(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Telah berhasil dihapus!');
    }

    public function checkExists(Request $request)
    {
        if($request->quantity > 0){
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->product)->get();
            if(count($cart)>0){
                return $cart;
            }else{
                return false;
            }
        }
        return 'error';
    }

    public function updatequantity(Request $request){
        $cart = Cart::where('id', $request->cart_id)->first();
        $cart->update([
            'stock' => $request->quantity,
        ]);
    }
}
