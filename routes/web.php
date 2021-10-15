<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function ()
{
    Route::get('/', function ()
    {
        return view('auth.login');
    });

    Auth::routes([
        'register' => false
    ]);
    Route::group(['middleware' => ['role:Admin']], function ()
    {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });

    Route::group(['middleware' => ['role:IotAdmin']], function ()
    {
        Route::get('/iothome', [App\Http\Controllers\HomeController::class, 'index'])->name('iothome');
    });
});
Route::prefix('')->group(function ()
{
    Route::get('{any}', function ()
    {
        return view('site');
    })->where('any', '.*');
});

