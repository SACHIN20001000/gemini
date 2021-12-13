<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;

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

Route::post('registers', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function ()
{
    Route::get('profile', [UserController::class, 'userProfile']);
    Route::put('update', [UserController::class, 'updateProfile']);
    Route::get('logout', [PassportAuthController::class, 'logout']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::any('categories/{id}', [CategoryController::class, 'category_by_id']);
    Route::get('products', [ProductController::class, 'index']);
    Route::any('products/{id}', [ProductController::class, 'productById']);
    Route::any('products/category/{id}', [ProductController::class, 'productByCategoryId']);

    Route::group(['middleware' => ['role:User']], function ()
    {
      
    });
});
