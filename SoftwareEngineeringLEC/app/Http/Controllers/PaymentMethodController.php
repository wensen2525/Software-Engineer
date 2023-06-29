<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
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
        return view('payments.create',[
            'user'  => User::find(Auth::user())->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'bankname' => 'required|string|max:255',
            'nameaccount' => 'required|string|max:255',
            'numberaccount' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::user())->first();

        PaymentMethod::create([
            'bankname' => $request->bankname,
            'nameaccount' => $request->nameaccount,
            'numberaccount' => $request->numberaccount,
            'user_id' => $user->id
        ]);

        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
    }

    public function view(){
        $user = User::find(Auth::user())->first();
        return view('payments.view',[
            'user'  => $user,
            'payments' => PaymentMethod::where('user_id',$user->id)->get(),
        ]);
    }
}
