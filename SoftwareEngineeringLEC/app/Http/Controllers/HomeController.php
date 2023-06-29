<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'user'  => User::find(Auth::user())->first(),
            'recomendeds' => Product::all()->take(5),
            'sellings' => Product::all()->skip(2)->take(5),
            'populars' => Product::all()->reverse()->skip(1)->take(5),
        ]);
    }
}
