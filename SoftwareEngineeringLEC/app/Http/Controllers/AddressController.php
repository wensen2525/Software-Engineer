<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addresses.create',[
            'user'  => User::find(Auth::user())->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detailaddress' => 'required|string',
        ]);

        $user = User::find(Auth::user())->first();

        Address::create([
            'nameaddress' => $request->name,
            'detailaddress' => $request->detailaddress,
            'user_id' => $user->id
        ]);

        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }

    public function view(){
        $user = User::find(Auth::user())->first();
        return view('addresses.view',[
            'user'  => $user,
            'addresses' => Address::where('user_id',$user->id)->get(),
        ]);
    }
}
