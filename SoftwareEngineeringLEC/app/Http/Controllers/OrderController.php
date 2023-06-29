<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Confirmation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user())->first();

        $orders_unpaid = Confirmation::whereHas('cart', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', false)->get()->reverse();

        // dd($orders_unpaid);

        $codes_unpaid = Confirmation::whereHas('cart', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', true)->select('codeConfirmation')->get();


        $orders_paid = Confirmation::whereHas('cart', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', true)->get()->reverse();

        $codes_paid = Confirmation::whereHas('cart', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', true)->select('codeConfirmation')->get();

        $orders_s_paid = Confirmation::whereHas('checkone', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', true)->get()->reverse();

        $orders_s_unpaid = Confirmation::whereHas('checkone', function($query) {
            $user = User::find(Auth::user())->first();
            $query->where('user_id', $user->id);
        })->where('isPaid', false)->get()->reverse();


        return view('orders.index',[
            'orders_unpaid' => $orders_unpaid,
            'orders_paid' => $orders_paid,
            'codes_unpaid' => $codes_unpaid,
            'codes_paid' => $codes_paid,
            'orders_s_unpaid' => $orders_s_unpaid,
            'orders_s_paid' => $orders_s_paid,
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    
}
