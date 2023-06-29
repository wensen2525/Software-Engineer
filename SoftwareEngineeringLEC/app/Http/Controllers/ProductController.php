<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\User;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('products.index',[
            'user' => User::find(Auth::user())->first(),
            'products' => Product::all(),
            // 'averagestar' => $averagestar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create',[
            'user' => User::find(Auth::user())->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpg,png,svg,jpeg|image'
        ]);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $proofNameToStore = $request->name . '.' . $extension;
            $request->file('image')->storeAs('/public/images/products', $proofNameToStore);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => str_replace(".", "", $request->stock),
            'price' => str_replace(".", "",$request->price),
            'image' => $proofNameToStore
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($product);
        return view ('products.view', [
            'user' => User::find(Auth::user())->first(),
            'product' => $product,
            'sizes' => Size::all(),
            'sz' => Size::where('name','random')->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
