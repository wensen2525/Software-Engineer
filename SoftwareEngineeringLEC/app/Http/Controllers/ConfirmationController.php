<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Support\Str;
use App\Models\Confirmation;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ProductDelivery;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreConfirmationRequest;
use App\Http\Requests\UpdateConfirmationRequest;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Confirmation $confirmation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Confirmation $confirmation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Confirmation $confirmation)
    {
        $confirmation->update([
            'isPaid' => true
        ]);
        if($confirmation->checkone){
            $stockNow = $confirmation->checkone->product->stock;
            $quantity = $confirmation->checkone->quantity;
            $stockNew = $stockNow - $quantity;

            $confirmation->checkone->product->update([
                'stock' => $stockNew,
            ]);

            $user = User::find(Auth::user())->first();

            Order::create([
                'codeConfirmation' => $request->codeConfirmation,
                'codeConfirmationSuccess' => 'SPaid' . $request->codeConfirmation,
                'user_id' => $user->id,
            ]);

            return redirect()->route('orders.index');
        }elseif($confirmation->cart){
            $stockNow = $confirmation->cart->product->stock;
            $quantity = $confirmation->cart->quantity;
            $stockNew = $stockNow - $quantity;

            $confirmation->cart->product->update([
                'stock' => $stockNew,
            ]);

            $user = User::find(Auth::user())->first();

            Order::create([
                'codeConfirmation' => $request->codeConfirmation,
                'codeConfirmationSuccess' => 'SSPaid' . $request->codeConfirmation,
                'user_id' => $user->id,
            ]);

            return redirect()->route('orders.index');
        }else{
            return redirect()->route('orders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Confirmation $confirmation)
    {
        //
    }

    public function view(Request $request){
        // dd($request);
        
        $confirmations = Confirmation::create([
            'codeConfirmation' => $request->codeConfirmation,
            'checkone_id' => $request->checkout,
            'paymentmethod_id' => $request->paymentmethod,
            'address_id' => $request->address,
            'productdelivery_id' => $request->productdelivery,
        ]);

        return view('confirmations.index',[
            'confirmations' => $confirmations,
            'codeConfirmation' => $request->codeConfirmation
        ]);
    }

    public function checkcart(Request $request){

        $confirmations = Confirmation::where('codeConfirmation', $request->codeConfirmation)->get();

        foreach ($confirmations as $confirmation){
            $confirmation->update([
                'paymentmethod_id' => $request->paymentmethod,
                'address_id' => $request->address,
                'productdelivery_id' => $request->productdelivery,
            ]);
        }
        $address = Address::where('id',$request->address)->first();
        $paymentMethod = PaymentMethod::where('id', $request->paymentmethod)->first();
        $productdelivery = Productdelivery::where('id', $request->productdelivery)->first();
        
        return view('confirmations.cart',[
            'confirmations' => $confirmations,
            'codeConfirmation' => $request->codeConfirmation,
            'paymentMethod' => $paymentMethod,
            'address' => $address,
            'productdelivery' => $productdelivery,
            'totalPriceProducts' => $request->totalPriceProducts,
        ]);
    }

    public function viewcart(Request $request){
        // dd($request);
        

        $user = User::find(Auth::user())->first();
        $carts = Cart::where('user_id', $user->id)->where('isPaid',false)->get();

        $iscreated = false;
        $addresses = Address::where('user_id',$user->id)->get();
        $paymentMethods = PaymentMethod::where('user_id',$user->id)->get();

        $productDeliveries = ProductDelivery::all();
        $productDeliveryOne = $productDeliveries->first();

        $addressOne = $addresses->first();
        $paymentMethodOne = $paymentMethods->first();
        if(!$paymentMethodOne || !$addressOne){
            return redirect()->back();
        }
        // dd($addressOne,$addressOne,$productDeliveryOne);
        $user_id = $user->id;
        // dd($user_id);
        $name = $user->name;
        $twocharacter = Str::upper($name[0] . $name[1]);

        $datetimeNow = Carbon::now('WIB');
        $date = $datetimeNow->year . $datetimeNow->month . $datetimeNow->day;
        // dd($datetimeNow->hour, $datetimeNow->minute, $datetimeNow->second);
        $time = $datetimeNow->hour . $datetimeNow->minute . $datetimeNow->second;
        
        $codeConfirmation = $twocharacter . $date . $time . $user_id;
        // dd($codeConfirmation);

        foreach($carts as $cart){
            $cart_id = $cart->id;
            if($request->$cart_id != null){
                // dd($codeConfirmation);
                Confirmation::create([
                    'codeConfirmation' => $codeConfirmation,
                    'cart_id' => $cart_id,
                    'paymentmethod_id' => $paymentMethodOne->id,
                    'address_id' => $addressOne->id,
                    'productdelivery_id' => $productDeliveryOne->id,
                ]);
                $cart->update([
                    'isPaid' => true,
                ]);
                $iscreated = true;
            }
        }
        // dd("end");
        if($iscreated == false){
            return redirect()->back();
        }

        $confirmations = Confirmation::where('codeConfirmation', $codeConfirmation)->get();

        // dd($productDeliveryOne, $productDeliveries);

        $totalPriceProducts = 0;

        foreach ($confirmations as $confirmation) {
            $totalPriceProducts += $confirmation->cart->totalPriceProduct;
        }

        return view('checkmany.create',[
            'confirmations' => $confirmations,
            'codeConfirmation' => $codeConfirmation,
            'addresses' => $addresses,
            'paymentMethods' => $paymentMethods,
            'productDeliveries' => $productDeliveries,
            'addressOne' => $addressOne,
            'paymentMethodOne' => $paymentMethodOne,
            'productDeliveryOne' => $productDeliveryOne,
            'totalPriceProducts' => $totalPriceProducts,

        ]);
    }



    public function carts_confirm(Request $request){
        $confirmations = Confirmation::where('codeConfirmation', $request->codeConfirmation)->get();

        foreach ($confirmations as $confirmation){
            $confirmation->update([
                'isPaid' => true
            ]);
            $stockNow = $confirmation->cart->product->stock;
            $quantity = $confirmation->cart->quantity;
            $stockNew = $stockNow - $quantity;

            $confirmation->cart->product->update([
                'stock' => $stockNew,
            ]);

        }
        
        $user = User::find(Auth::user())->first();

        Order::create([
            'codeConfirmation' => $request->codeConfirmation,
            'codeConfirmationSuccess' => 'MPaid' . $request->codeConfirmation,
            'user_id' => $user->id,
        ]);

        return redirect()->route('orders.index');
    }
}
