<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Shop\HomeController as ShopHomeController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Shop\CartController as ShopCartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Shop\OrderController as ShopOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Shop\Auth\LoginController;
use App\Http\Controllers\Shop\Auth\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/stats', [HomeController::class, 'stats'])->name('stats');

Route::prefix('/admin')
->middleware('auth')
->middleware(['role:super-admin'])
->group(function () {
    
    Route::get('/chat', [HomeController::class, 'chat'])->name('chats');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('ads', AdController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('carts', CartController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('orders/print/{order}', [OrderController::class,'print'])->name('orders.print');
    Route::get('orders/followup', [OrderController::class,'followup'])->name('orders.followup');
    Route::get('orders/update_order_status_one/{order}', [OrderController::class,'update_order_status_one'])->name('update_order_status_one');
    Route::get('orders/update_order_status_two/{order}', [OrderController::class,'update_order_status_two'])->name('update_order_status_two');
    Route::get('orders/update_order_status_three/{order}', [OrderController::class,'update_order_status_three'])->name('update_order_status_three');
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::get('profile', [
            \App\Http\Controllers\ProfileController::class,
            'show',
        ])->name('profile.show');
        Route::put('profile', [
            \App\Http\Controllers\ProfileController::class,
            'update',
        ])->name('profile.update');
    });


Route::get('/', [ShopHomeController::class, 'index'])->name('shop.home');
Route::prefix('/shop')->name('shop.')
    ->middleware(['role:user', 'auth'])
    ->namespace('Shop')
    ->group(function () {
        Route::get('/', [ShopHomeController::class, 'index'])->name('home');
        Route::get('products', [ShopProductController::class, 'index'])->name('products');
        Route::get('products/{product}', [ShopProductController::class, 'show'])->name('products.show');
        
        Route::get('orders', [ShopOrderController::class, 'index'])->name('orders');
        Route::get('orders/{order}', [ShopOrderController::class, 'show'])->name('orders.show');
        
        Route::get('cart', [ShopCartController::class, 'index'])->name('cart.show');
        Route::get('checkout', [ShopCartController::class, 'checkout'])->name('cart.checkout');
        Route::get('/chat', [ShopHomeController::class, 'chat'])->name('chats');
});

Route::get('shop/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('shop/login', [LoginController::class, 'login'])->name('login');

Route::get('shop/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('shop/register', [RegisterController::class, 'register'])->name('register');