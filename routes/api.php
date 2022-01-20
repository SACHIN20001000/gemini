<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\Chowhub\ChowhubProductController;
use App\Http\Controllers\API\Chowhub\ChowhubCategoryController;
use App\Http\Controllers\API\Chowhub\ChowhubStoreController;

use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\RatingController;




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
Route::get('products', [ProductController::class, 'index']);
Route::middleware([EnsureApiTokenIsValid::class])->group(function () {
  Route::get('categories', [CategoryController::class, 'index']);
  Route::any('categories/{id}', [CategoryController::class, 'category_by_id']);

  Route::any('products/{id}', [ProductController::class, 'productById']);
  Route::any('products/category/{id}', [ProductController::class, 'productByCategoryId']);
  Route::get('products/attributes/{id}', [ProductController::class, 'getAttributeByProduct']);

  Route::get('chowhub/products', [ChowhubProductController::class, 'index']);
  Route::any('chowhub/products/{id}', [ChowhubProductController::class, 'productById']);
  Route::any('chowhub/products/category/{id}', [ChowhubProductController::class, 'productByCategoryId']);
  Route::get('chowhub/products/attributes/{id}', [ChowhubProductController::class, 'getAttributeByProduct']);
  Route::get('chowhub/categories', [ChowhubCategoryController::class, 'index']);
  Route::any('chowhub/categories/{id}', [ChowhubCategoryController::class, 'category_by_id']);

  Route::get('pages', [PageController::class, 'index']);
  Route::any('pages/{id}', [PageController::class, 'pageByID']);


});

Route::get('chowhub/tags', [ChowhubProductController::class, 'allTags']);

Route::middleware('auth:api')->group(function ()
{
    Route::get('profile', [UserController::class, 'userProfile']);
    Route::put('update', [UserController::class, 'updateProfile']);
    Route::get('logout', [PassportAuthController::class, 'logout']);

    Route::group(['middleware' => ['role:User']], function ()
    {

    });
    Route::resource('order', OrderController::class);
});

Route::resource('cart', CartController::class);
Route::get('cartIdByKey', [CartController::class, 'getCartIDUsingKey']);
Route::delete('cart/{cart}/{itemId}', [CartController::class, 'deleteCartItem']);
Route::post('/cart/{cart}',[CartController::class, 'addProducts']);
Route::post('/checkout/{cart}',[CartController::class, 'checkout']);
Route::get('settings', [SettingController::class, 'index']);
Route::post('coupon', [CouponController::class, 'index']);

Route::get('stores', [StoreController::class, 'index']);
Route::get('faq/{product_id}', [FaqController::class, 'index']);
Route::post('faq/store', [FaqController::class, 'store']);
Route::get('chowhub/faq/{product_id}', [FaqController::class, 'chouhubIndex']);
Route::post('chowhub/faq/store', [FaqController::class, 'chouhubStore']);
Route::post('rating/create', [RatingController::class, 'create']);
Route::get('rating', [RatingController::class, 'index']);


Route::get('stores/{store}', [StoreController::class, 'show']);
Route::get('chowhub/stores', [ChowhubStoreController::class, 'index']);
Route::get('chowhub/stores/{store}', [ChowhubStoreController::class, 'show']);





