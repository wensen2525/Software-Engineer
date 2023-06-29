<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Size;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ProductDelivery;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user())->first();

        $carts = Cart::where('user_id', $user->id)->where('isPaid',false)->get();

        $count_carts = $carts->count();
        $totalPriceCartsNow = 0;
        foreach($carts as $cart){
            $totalPriceCartsNow += $cart->totalPriceProduct;
        }
        // dd($totalPriceCartsNow);
        $addresses = Address::where('user_id',$user->id)->get();
        $paymentMethods = PaymentMethod::where('user_id',$user->id)->get();

        $addressOne = $addresses->first();
        $paymentMethodOne = $paymentMethods->first();


        return view('carts.index',[
            'user' => $user,
            'carts' => $carts,
            'totalPriceCartsNow' => $totalPriceCartsNow,
            'count_carts' => $count_carts,
            'addressOne' => $addressOne,
            'paymentMethodOne' => $paymentMethodOne,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("carts", $request);
        $request->validate([
            'product' => 'required|string',
            'size' => 'required|string',
            'quantity' => 'required',
        ]);
        
        $product = Product::where('id', $request->product)->first();
        $user = User::find(Auth::user())->first();
        $size = Size::where('id', $request->size)->first();
        // dd($size->id);
        Cart::create([
            'product_id' => $request->product,
            'user_id' => $user->id,
            'size_id' => $size->id,
            'quantity' => $request->quantity,
            'totalPriceProduct' => $request->quantity * $product->price
        ]);

        // $product->update([
        //     'stock' => $product->stock - $request->quantity
        // ]);

        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        dd($cart);
        $cart->delete();
        return redirect()->back();
    }

    public function updatequantity(Request $request){
        // dd($request);
        $cart = Cart::where('id', $request->cart_id)->first();
        $cart->update([
            'quantity' => $request->quantity,
            'totalPriceProduct' => $request->quantity * $cart->product->price
        ]);

        // return redirect()->route('carts.index');
    }

    public function delete($cart)
    {
        $cart = Cart::where('id', $cart)->first();
        // dd($cart);
        $cart->delete();
        return redirect()->back();
    }
}
