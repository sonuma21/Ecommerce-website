<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'home'])->name('home');
Route::post('/',[PageController::class,'store_request'])->name('store_request');
Route::get('/compare',[PageController::class,'compare'])->name('compare');
Route::get('/product/{id}',[PageController::class,'product'])->name('product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/carts', [CartController::class, 'carts'])->name('carts');
    Route::post('/add-to-cart',[CartController::class,'add_to_cart'])->name('add_to_cart');
    Route::put('/update-quantity',[CartController::class,'updateQuantity'])->name('carts.updateQuantity');
    Route::delete('/carts/{id}',[CartController::class,'delete'])->name('carts.delete');

});

require __DIR__.'/auth.php';

Route::fallback([PageController::class,'notFound']);

use Laravel\Socialite\Facades\Socialite;

Route::get('/google/login', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/google/callback', function () {
    $user = Socialite::driver('google')->user();

    // $user->token
    $oldUser = User::where('email',$user->email)->first();
    if($oldUser){
        Auth::login($oldUser);
        return redirect('/');
    }
    $newUser = new User();
    $newUser->name = $user->name;
    $newUser->email = $user->email;
    $newUser->password = Hash::make (uniqid());
    $newUser->save();

    Auth::login($newUser);
    return redirect ('/');

});
