<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\CheckOne;
use Illuminate\Support\Str;
use App\Models\Confirmation;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ProductDelivery;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCheckOneRequest;
use App\Http\Requests\UpdateCheckOneRequest;

class CheckOneController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckOne $checkOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckOne $checkOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckOne $checkOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckOne $checkOne)
    {
        // dd($checkOne);
    }

    public function view(Request $request)
    {

        // dd("checkone", $request);
        $user = User::find(Auth::user())->first();
        $product = Product::where('id', $request->product)->first();
        
        $addresses = Address::where('user_id',$user->id)->get();
        $paymentMethods = PaymentMethod::where('user_id',$user->id)->get();

        $addressOne = $addresses->first();
        $paymentMethodOne = $paymentMethods->first();

        $productDeliveries = ProductDelivery::all();
        $productDeliveryOne = $productDeliveries->first();
        // dd($addressOne,$paymentMethodOne);

        $checkout = CheckOne::create([  
            'user_id' => $user->id,
            'size_id'  => $request->size,
            'quantity' => $request->quantity,
            'product_id' => $request->product,
            'totalPriceProduct' => $product->price * $request->quantity,
        ]);
        // dd($checkout);

        $user_id = $user->id;
        $name = $user->name;
        $twocharacter = Str::upper($name[0] . $name[1]);

        $datetimeNow = Carbon::now('WIB');
        $date = $datetimeNow->year . $datetimeNow->month . $datetimeNow->day;
        $time = $datetimeNow->hour . $datetimeNow->minute . $datetimeNow->second;
        
        $codeConfirmation = $twocharacter . $date . $time . $user_id;

        return view('checkone.create',[
            'product' => $product,
            'user' => $user,
            'size' => Size::where('id', $request->size)->first(),
            'quantity' => $request->quantity,
            'addresses' => $addresses,
            'paymentMethods' => $paymentMethods,
            'productDeliveries' => $productDeliveries,
            'addressOne' => $addressOne,
            'paymentMethodOne' => $paymentMethodOne,
            'productDeliveryOne' => $productDeliveryOne,
            'checkout' => $checkout,
            'codeConfirmation' => $codeConfirmation
        ]);

    }

    public function delete(Request $request){
        // dd($request);

        $checkOne = CheckOne::where('id',$request->checkout)->first();

        $checkOne->delete();

        return redirect()->route('home');
    }

}
