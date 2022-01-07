<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\SettingController;

use App\Http\Controllers\API\StoreController;
use App\Http\Middleware\EnsureApiTokenIsValid;
/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('oauth/token', [PassportAuthController::class, 'oauth_token']);

Route::middleware([EnsureApiTokenIsValid::class])->group(function () {
  Route::get('categories', [CategoryController::class, 'index']);
  Route::any('categories/{id}', [CategoryController::class, 'category_by_id']);
  Route::get('products', [ProductController::class, 'index']);
  Route::any('products/{id}', [ProductController::class, 'productById']);
  Route::any('products/category/{id}', [ProductController::class, 'productByCategoryId']);
  Route::get('pages', [PageController::class, 'index']);
  Route::any('pages/{id}', [PageController::class, 'pageByID']);
  Route::get('products/attributes/{id}', [ProductController::class, 'getAttributeByProduct']);

});



Route::middleware('auth:api')->group(function ()
{
    Route::get('profile', [UserController::class, 'userProfile']);
    Route::put('update', [UserController::class, 'updateProfile']);
    Route::get('logout', [PassportAuthController::class, 'logout']);

    Route::group(['middleware' => ['role:User']], function ()
    {
      
    });
});

Route::resource('cart', CartController::class);
Route::get('cartIdByKey', [CartController::class, 'getCartIDUsingKey']);
Route::delete('cart/{cart}/{itemId}', [CartController::class, 'deleteCartItem']);
Route::post('/cart/{cart}',[CartController::class, 'addProducts']);
Route::post('/checkout/{cart}',[CartController::class, 'checkout']);
Route::get('settings', [SettingController::class, 'index']);

Route::get('stores', [StoreController::class, 'index']);
Route::get('stores/{store}', [StoreController::class, 'show']);

Route::resource('order', OrderController::class);



