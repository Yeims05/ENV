<?php

use App\Http\Controllers\User\AuthLoginController;
use App\Http\Controllers\Cart\AddProductController;
use App\Http\Controllers\Cart\CheckOutController;
use App\Http\Controllers\Cart\PaymentController;
use App\Http\Controllers\Cart\RemoveCartController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\Front\ViewHomeController;
use App\Http\Controllers\Front\ViewLoginController;
use App\Http\Controllers\Front\ViewRegisterController;
use App\Http\Controllers\Front\ViewCartController;
use App\Http\Controllers\Front\ViewPageController;
use App\Http\Controllers\Front\ViewProductController;
use App\Http\Controllers\Front\ViewUsersController;
use App\Http\Controllers\Product\CreateProductController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\UpdateProductController;
use App\Http\Controllers\User\LogoutUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Vistas principales
Route::get('home', ViewHomeController::class);
Route::get('login', ViewLoginController::class);
//registro y manejo de usuarios
Route::get('register', ViewRegisterController::class);
Route::post('register', CreateUserController::class);
Route::get('users', ViewUsersController::class)->name('admin.user.index');
//Sesion de usuarios
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::post('/logout', [LogoutUserController::class, 'logout'])->name('logout');
//manejo del carrito y de los pagos
Route::post('/cart/checkout', [CheckOutController::class, 'checkout'])->name('cart.checkout');
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('addcart', [AddProductController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [ViewCartController::class, 'index'])->name('cart.index');
Route::delete('cart/remove', RemoveCartController::class)->name('cart.remove');
//vistas del manejo de productos
Route::get('product', ViewProductController::class);
Route::post('product', CreateProductController::class);
Route::post('product/edit/{id}', UpdateProductController::class,'edit');
Route::post('product/delete/{id}', [DeleteProductController::class, '__invoke'])->name('product.delete');

Route::get('page', ViewPageController::class);
