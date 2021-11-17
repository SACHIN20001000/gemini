<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

use Illuminate\Support\Facades\Auth;

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
Route::get('logout' , function ()
{
    dd("asljkdh");
    Auth::logout();
    return "Logout Auth";
}) ;
Route::prefix('admin')->group(function ()
{
    Route::get('/', function ()
    {
        return view('admin.login');
    })->middleware(['guest']);;
    Route::get('/forgotPassword', function ()
    {
        return view('admin.forgotPassword');
    })->middleware(['guest']);

    Route::group(['middleware' => ['role:Admin']], function ()
    {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
    });


});

Route::prefix('iot-admin')->group(function ()
{

    Route::get('/', function ()
    {
        return view('iotAdmin.login');
    })->middleware(['guest']);;

    Route::get('/forgotPassword', function ()
    {
        return view('iotAdmin.forgotPassword');
    })->middleware(['guest']);


    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])
    ->middleware('guest');

Route::group(['middleware' => ['role:IotAdmin']], function ()
    {
        Route::get('/dashboard', [App\Http\Controllers\IotAdmin\DashboardController::class, 'index'])->name('iothome');
    });
});
Auth::routes([
    'register' => false
]);

Route::prefix('')->group(function ()
{
    Route::get('{any}', function ()
    {
        return view('site');
    })->where('any', '.*');
});
