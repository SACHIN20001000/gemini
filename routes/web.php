<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\SettingController;



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
Route::get('logout', function ()
{
    Auth::logout();
    return "Logout Auth";
});
Route::prefix('admin')->group(function ()
{
    Route::get('/', function ()
    {
        return view('admin.login');
    })->middleware(['guest']);
    ;
    Route::get('/forgotPassword', function ()
    {
        return view('admin.forgotPassword');
    })->middleware(['guest']);

    Route::group(['middleware' => ['role:Admin']], function ()
    {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('page-categories', PageCategoriesController::class);
        Route::resource('products', ProductController::class);
        Route::resource('brands', BrandsController::class);
        Route::resource('settings', SettingController::class);



        Route::resource('users', UserController::class);
        Route::get('view-profile', [App\Http\Controllers\Admin\AdminController::class, 'viewProfile'])->name('viewProfile');
        Route::get('update-profile', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('updateProfile');
        Route::post('update-user-profile/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateUserProfile'])->name('updateUserProfile');

        Route::get('/page', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('pages');
        Route::post('/store', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('storePage');
        Route::get('add-page', [App\Http\Controllers\Admin\PageController::class, 'addPages'])->name('addPages');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'editPage'])->name('editPage');
        Route::post('/update', [App\Http\Controllers\Admin\PageController::class, 'updatePage'])->name('updatePage');
        Route::any('/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'deletePage'])->name('deletePage');
    });
});

Route::prefix('iot-admin')->group(function ()
{

    Route::get('/', function ()
    {
        return view('iotAdmin.login');
    })->middleware(['guest']);
    ;

    Route::get('/forgotPassword', function ()
    {
        return view('iotAdmin.forgotPassword');
    })->middleware(['guest']);

    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])
            ->middleware('guest');

    Route::group(['middleware' => ['role:IotAdmin']], function ()
    {
        Route::get('/dashboard', [App\Http\Controllers\IotAdmin\DashboardController::class, 'index'])->name('iothome');
        Route::get('/user', [App\Http\Controllers\IotAdmin\UserListController::class, 'index'])->name('userlist');
        Route::get('/edit/{id}', [App\Http\Controllers\IotAdmin\UserListController::class, 'editUser'])->name('editUser');
        Route::post('/update', [App\Http\Controllers\IotAdmin\UserListController::class, 'updateUser'])->name('updateUser');

        Route::any('/delUser/{id}', [App\Http\Controllers\IotAdmin\UserListController::class, 'delUser'])->name('delUser');
        Route::get('/adduser', [App\Http\Controllers\IotAdmin\UserListController::class, 'addUser'])->name('addUser');
        Route::post('/addNewUser', [App\Http\Controllers\IotAdmin\UserListController::class, 'addNewUser'])->name('addNewUser');
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
