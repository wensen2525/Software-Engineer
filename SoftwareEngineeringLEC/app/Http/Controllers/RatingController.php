<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

class RatingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'reviewtext' => 'required|string|',
            'ratingstar' => 'required',
        ]);

        $user = User::find(Auth::user())->first();
        $product = Product::where('id',$request->product)->first();

        Rating::create([
            'reviewText' => $request->reviewtext,
            'ratingStar' => $request->ratingstar,
            'product_id' => $product->id,
            'user_id' => $user->id
        ]);

        $totaluserrating = Rating::where('product_id',$product->id)->get()->count();
        $averageStar = ($product->averageStar + $request->ratingstar) / $totaluserrating;
        $product->update([
            'averageStar' => $averageStar
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }

    public function rating($product){
        // dd(Product::where('id',$product)->first());
        return view('ratings.create',[
            'user' => User::find(Auth::user())->first(),
            'product' => Product::where('id',$product)->first(),
        ]);
    }
}
