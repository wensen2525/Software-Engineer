<?php

use App\Models\User;
use App\Models\Rating;
use App\Models\Address;
use App\Models\CheckOne;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOneController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\PaymentMethodController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('profile', function () {
    $user = User::find(Auth::user())->first();
    return view('profile',[
        'user' => $user,
        'addresses' => Address::where('user_id',$user->id)->get(),
        'paymentMethods' => PaymentMethod::where('user_id',$user->id)->get(),

    ]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// user addresses route
Route::prefix('addresses')->name('addresses.')->group(function () {
    Route::get('view', [AddressController::class, 'view'])->name('view');
});
Route::resource('addresses', AddressController::class);

//payment methods route
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('view', [PaymentMethodController::class, 'view'])->name('view');
});
Route::resource('payments', PaymentMethodController::class);

// rating route
Route::prefix('ratings')->name('ratings.')->group(function () {
    Route::get('{product}/rating', [RatingController::class, 'rating'])->name('rating');
});
Route::resource('ratings', RatingController::class);

//checkout one route
Route::prefix('checkones')->name('checkones.')->group(function () {
    Route::post('view', [CheckOneController::class, 'view'])->name('view');
    Route::post('delete', [CheckOneController::class, 'delete'])->name('delete');
});
Route::resource('checkones', CheckOneController::class);

//confirmation payment
Route::prefix('confirmations')->name('confirmations.')->group(function () {
    Route::post('view', [ConfirmationController::class, 'view'])->name('view');
    Route::post('viewcart', [ConfirmationController::class, 'viewcart'])->name('viewcart');
    Route::post('checkcart', [ConfirmationController::class, 'checkcart'])->name('checkcart');
    Route::put('carts_confirm',[ConfirmationController::class, 'carts_confirm'])->name('carts_confirm');
});
Route::resource('confirmations', ConfirmationController::class);

Route::prefix('carts')->name('carts.')->group(function () {
    Route::get('{cart}/delete', [CartController::class, 'delete'])->name('delete');
});
Route::resource('carts', CartController::class);

// update quantity without reload route
Route::post('updatequantity', [CartController::class, 'updatequantity']);


//resource route without prefix
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

