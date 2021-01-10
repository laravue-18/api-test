<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::get('login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('addSeller', function () {
        return view('seller');
    });
    Route::get('addSellerDeal', function () {
        $sellers = auth()->user()->sellers;
        return view('add-seller-deal')->with(compact('sellers'));
    });
    Route::get('seller-lease-parameters/store', function () {
        $sellers = auth()->user()->sellers;
        if(count($sellers)) $products = $sellers[0]->products;
        else $produts = [];
        return view('seller-lease-parameters-store')->with(compact('sellers', 'products'));
    });
    Route::get('product/discount', function () {
        $sellers = auth()->user()->sellers;
        if(count($sellers)) $products = $sellers[0]->products;
        else $produts = [];
        return view('product-discount')->with(compact('sellers', 'products'));
    });
    Route::get('product/purchase', function () {
        $sellers = auth()->user()->sellers;
        if(count($sellers)) $products = $sellers[0]->products;
        else $produts = [];
        return view('product-purchase')->with(compact('sellers', 'products'));
    });
    Route::get('addDealNegotiationParameters', function () {
        $sellers = auth()->user()->sellers;
        if(count($sellers)) $products = $sellers[0]->products;
        else $produts = [];
        return view('add-deal-negotiation-parameters')->with(compact('sellers', 'products'));
    });
    Route::get('seller-finance-parameters/store', function () {
        $sellers = auth()->user()->sellers;
        if(count($sellers)) $products = $sellers[0]->products;
        else $produts = [];
        return view('seller-finance-parameters-store')->with(compact('sellers', 'products'));
    });
    Route::get('logout', [ApiController::class, 'logout']);
});


Route::post('login', [ApiController::class, 'login']);
Route::post('addClient', [ApiController::class, 'addClient']);
Route::post('addSeller', [ApiController::class, 'addSeller']);
Route::post('addSellerDeal', [ApiController::class, 'addSellerDeal']);
Route::post('seller-lease-parameters/store', [ApiController::class, 'addSellerLeaseParameters']);
Route::post('product/discount', [ApiController::class, 'discount']);
Route::post('product/purchase', [ApiController::class, 'discount']);
Route::post('addDealNegotiationParameters', [ApiController::class, 'addDealNegotiationParameters']);
Route::post('seller-finance-parameters/store', [ApiController::class, 'loan']);
Route::post('getProducts', [ApiController::class, 'getProducts']);
