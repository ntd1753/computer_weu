<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('content.home.index');
})->name('home');
Route::prefix('product')->group(function(){
        Route::get('/{slug}', [ProductController::class,'detail'])->name('product.detail');
});
Route::prefix('cart')->group(function(){
    Route::get('/', [\App\Http\Controllers\CartController::class,'showCart'])->name('cart.index');
    Route::post('/add', [\App\Http\Controllers\CartController::class,'addToCart'])->name('cart.add');
    Route::post('/remove', [\App\Http\Controllers\CartController::class,'removeFromCart'])->name('cart.remove');
});
Route::prefix('order')->group(function(){
    Route::get('/', [\App\Http\Controllers\OrderController::class,'index'])->name('order.index');
    Route::post('/place', [\App\Http\Controllers\OrderController::class,'placeOrder'])->name('order.place');
});
Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name("auth.register");
Route::post('/register/store',[RegisterController::class,'storeUserAccount'])->name("auth.register.store");
Route::post('/login/store',[LoginController::class,'Login'])->name("auth.login.store");
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("auth.login"); // Cho người dùng
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name("auth.login.provider");
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('auth.login.provider.callback');
Route::post('/logout', [LoginController::class,"logout"])->name("auth.logout");
