<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Chowhub\ChowhubCategoryController;
use App\Http\Controllers\Admin\Chowhub\ChowhubStoreController;
use App\Http\Controllers\Admin\Chowhub\ChowhubProductController;
use App\Http\Controllers\Admin\Chowhub\ChowhubCouponController;
use App\Http\Controllers\Admin\Chowhub\ChowhubImportController;


use App\Http\Controllers\Admin\Solutionhub\SolutionhubProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PetController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\Chowhub\ChowhubFaqController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\Chowhub\ChowhubRatingController;


use App\Http\Controllers\Admin\LitterHub\LitterHubStoreController;
use App\Http\Controllers\Admin\LitterHub\LitterHubProductController;
use App\Http\Controllers\Admin\LitterHub\LitterHubCouponController;
use App\Http\Controllers\Admin\LitterHub\LitterHubFaqController;







use App\Http\Controllers\Admin\BrandsController;
use App\Models\ProductGallery;


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
    return redirect('/admin');
});

Route::get('home', function ()
{
    Auth::logout();
   return redirect('/admin');
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
        Route::resource('coupons', CouponController::class);
        Route::resource('chowhub-coupons', ChowhubCouponController::class);

        Route::post('getProductByAjax', [CouponController::class,'getProductByAjax'])->name('getProductByAjax');


        Route::resource('page-categories', PageCategoriesController::class);
        Route::resource('products', ProductController::class);
        Route::any('/product/duplicate', [App\Http\Controllers\Admin\ProductController::class, 'duplicate'])->name('duplicate');
        Route::resource('stores', StoreController::class);
        Route::resource('orders', OrderController::class);

        Route::resource('chowhub-questions', ChowhubFaqController::class);
        Route::resource('litterhub-questions', LitterHubFaqController::class);
        Route::resource('chowhub-import', ChowhubImportController::class);
        Route::resource('ratings', RatingController::class);
        Route::post('save-image', [App\Http\Controllers\Admin\RatingController::class, 'save_photo']);
        Route::post('save-chowhub-image', [App\Http\Controllers\Admin\Chowhub\ChowhubRatingController::class, 'save_photo']);
        Route::resource('chowhub-ratings', ChowhubRatingController::class);
        Route::resource('questions', FaqController::class);
        //Solutionhub

        Route::resource('solutionhub-products', SolutionhubProductController::class);
        Route::any('/solutionhub-product/duplicate', [App\Http\Controllers\Admin\Solutionhub\SolutionhubProductController::class, 'duplicate'])->name('solutionhub_duplicate');

        //litterhub
        Route::resource('litterhub-store', LitterHubStoreController::class);
        Route::resource('litterhub-coupons', LitterHubCouponController::class);

        Route::resource('litterhub-products', LitterHubProductController::class);
        Route::post('save-litterhub-photo', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'save_photo']);
        Route::any('/litterhub-product/duplicate', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'duplicate'])->name('litterhub_duplicate');


        Route::post('save-litterhub-description-photo', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'save_description_photo']);

        Route::post('delete-litterhub-photo', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'del_photo']);
        Route::post('delete-litterhub-description-photo', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'del_description_photo']);
        Route::post('delete-litterhub-feature-page-photo', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'del_feature_page_photo']);
        Route::post('delete-litterhub-variation-img', [App\Http\Controllers\Admin\LitterHub\LitterHubProductController::class, 'del_variationPhoto']);


        //chowhub
        Route::resource('chowhub-categories', ChowhubCategoryController::class);
        Route::resource('chowhub-store', ChowhubStoreController::class);
        Route::resource('chowhub-products', ChowhubProductController::class);
        Route::any('/chowhub-product/duplicate', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'duplicate'])->name('chowhub_duplicate');
        Route::post('save-chowhub-photo', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'save_photo']);
        Route::post('save-description-photo', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'save_description_photo']);

        Route::post('delete-chowhub-photo', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'del_photo']);
        Route::post('delete-description-photo', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'del_description_photo']);
        Route::post('delete-feature-page-photo', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'del_feature_page_photo']);

        Route::post('delete-chowhub-variation-img', [App\Http\Controllers\Admin\Chowhub\ChowhubProductController::class, 'del_variationPhoto']);


        Route::get('delete-gallery/{id}', function () {
            ProductGallery::where('product_id',$id)->delete();
            return back()->with('success','Product deleted successfully!');
        });
        Route::post('save-photo', [App\Http\Controllers\Admin\ProductController::class, 'save_photo'])->name('save_photo');
        Route::post('delete-photo', [App\Http\Controllers\Admin\ProductController::class, 'del_photo'])->name('del_photo');
        Route::post('delete-banner-photo', [App\Http\Controllers\Admin\ProductController::class, 'del_banner_photo']);
        Route::post('delete-desp-feild', [App\Http\Controllers\Admin\ProductController::class, 'delete_desp_feild']);

        Route::post('delete-variation-img', [App\Http\Controllers\Admin\ProductController::class, 'del_variationPhoto'])->name('del_variationPhoto');
        Route::resource('brands', BrandsController::class);
        Route::resource('settings', SettingController::class);

        Route::resource('users', UserController::class);
        Route::any('pets/{id}', [PetController::class,'show'])->name('pets');
        Route::any('pets/edit/{id}', [PetController::class,'edit'])->name('edit');
        Route::any('pets/update/{id}', [PetController::class,'update'])->name('update');

        Route::any('pets/destroy/{id}', [PetController::class,'destroy'])->name('destroy');


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
