<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\IndexController;
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

// Admin Routes

Route::group(['prefix' => 'admin' , 'middleware' => ['admin:admin']],function(){
    Route::get('/login',[AdminController::class, 'loginForm'])->name('loginAdmin');
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');
Route::get('/admin/profile' , [AdminProfileController::class , 'adminProfile'])->name('admin.profile');
Route::get('/admin/edit/profile/{id}' , [AdminProfileController::class , 'editeProfile'])->name('edit.profile');
Route::post('/admin/store/profile/{id}' , [AdminProfileController::class , 'storeProfile'])->name('store.profile');
Route::get('/admin/edit/passowrd' , [AdminProfileController::class , 'changePass'])->name('admin.changePass');
Route::post('/admin/update/passowrd' , [AdminProfileController::class , 'updatePass'])->name('admin.updatePass');


// User Routes

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/' , [IndexController::class , 'index']);
Route::get('/user/logout' , [IndexController::class , 'userLogout'])->name('user.logout');
Route::get('/user/profile' , [IndexController::class , 'userProfile'])->name('user.profile');
Route::post('/update/user' , [IndexController::class , 'updateUserProfile'])->name('user.profile.store');
Route::get('/change/user/password' , [IndexController::class , 'updateUserPassword'])->name('user.change.password');
Route::post('/update/user/password' , [IndexController::class , 'changeUserPassword'])->name('user.update.password');


// Brand Routes
Route::prefix('brand')->group(function(){
Route::get('/view' , [BrandController::class , 'viewBrand'])->name('all.brand');
Route::post('/store' , [BrandController::class , 'storeBrand'])->name('brand.store');
Route::get('/edit/{id}' , [BrandController::class , 'editBrand'])->name('brand.edit');
Route::post('/update/{id}' , [BrandController::class , 'updateBrand'])->name('brand.update');
Route::get('/delete/{id}' , [BrandController::class , 'deleteBrand'])->name('brand.delete');

});
