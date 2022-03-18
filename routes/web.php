<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponsController;
use App\Http\Controllers\Backend\ProductsConroller;
use App\Http\Controllers\Backend\ShippingDivisionContriller;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\AddCartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\MyCartController;
use App\Http\Controllers\User\wishlistsController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');
    Route::get('/admin/profile' , [AdminProfileController::class , 'adminProfile'])->name('admin.profile');
    Route::get('/admin/edit/profile/{id}' , [AdminProfileController::class , 'editeProfile'])->name('edit.profile');
    Route::post('/admin/store/profile/{id}' , [AdminProfileController::class , 'storeProfile'])->name('store.profile');
    Route::get('/admin/edit/passowrd' , [AdminProfileController::class , 'changePass'])->name('admin.changePass');
    Route::post('/admin/update/passowrd' , [AdminProfileController::class , 'updatePass'])->name('admin.updatePass');

});



// Middelware Admin
Route::middleware(['auth:admin'])->group(function(){

    // Brand Routes
    Route::prefix('brand')->group(function(){
        Route::get('/view' , [BrandController::class , 'viewBrand'])->name('all.brand');
        Route::post('/store' , [BrandController::class , 'storeBrand'])->name('brand.store');
        Route::get('/edit/{id}' , [BrandController::class , 'editBrand'])->name('brand.edit');
        Route::post('/update/{id}' , [BrandController::class , 'updateBrand'])->name('brand.update');
        Route::get('/delete/{id}' , [BrandController::class , 'deleteBrand'])->name('brand.delete');

    });


    // Category Routes
    Route::prefix('category')->group(function(){

        Route::get('/view' , [CategoryController::class , 'viewCategory'])->name('all.category');
        Route::post('/store' , [CategoryController::class , 'storeCategory'])->name('category.store');
        Route::get('/edit/{id}' , [CategoryController::class , 'editCategory'])->name('category.edit');
        Route::post('/update/{id}' , [CategoryController::class , 'updateCategory'])->name('category.update');
        Route::get('/delete/{id}' , [CategoryController::class , 'deleteCategory'])->name('category.delete');

        // Sub Category Routes
        Route::get('/sub/view' , [SubCategoryController::class , 'viewSubCategory'])->name('all.subcategory');
        Route::post('/sub/store' , [SubCategoryController::class , 'storeSubCategory'])->name('subcategory.store');
        Route::get('/sub/edit/{id}' , [SubCategoryController::class , 'editSubCategory'])->name('subcategory.edit');
        Route::post('/sub/update/{id}' , [SubCategoryController::class , 'updateSubCategory'])->name('subcategory.update');
        Route::get('/sub/delete/{id}' , [SubCategoryController::class , 'deleteSubCategory'])->name('subcategory.delete');

        // Sub -> SubCategory Routes
        Route::get('/sub/sub/view' , [SubSubCategoryController::class , 'viewSubSubCategory'])->name('all.subsubcategory');
        Route::get('/subcategory/ajax/{category_id}' , [SubSubCategoryController::class , 'subCategoryAjax']);
        Route::post('/sub/sub/store' , [SubSubCategoryController::class , 'storeSubSubCategory'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}' , [SubSubCategoryController::class , 'editSubSubCategory'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update/{id}' , [SubSubCategoryController::class , 'updateSubSubCategory'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}' , [SubSubCategoryController::class , 'deleteSubSubCategory'])->name('subsubcategory.delete');

    });


    // Products Routes
    Route::prefix('product')->group(function(){

        Route::get('/add' , [ProductsConroller::class , 'addProduct'])->name('add.product');
        Route::get('/sub_subcategory/ajax/{subcategory_id}' , [ProductsConroller::class , 'sub_subCategoryAjax']);
        Route::post('/store' , [ProductsConroller::class , 'storeProduct'])->name('product.store');
        Route::get('/all' , [ProductsConroller::class , 'allProduct'])->name('all.product');
        Route::get('/view/{id}' , [ProductsConroller::class , 'viewProduct'])->name('view.product');
        Route::get('/edit/{id}' , [ProductsConroller::class , 'editProduct'])->name('edit.product');
        Route::post('/update/{id}' , [ProductsConroller::class , 'updateProduct'])->name('update.product');
        Route::get('/delete/{id}' , [ProductsConroller::class , 'deleteProduct'])->name('delete.product');

        Route::post('/image/update' , [ProductsConroller::class , 'updateImageProduct'])->name('update.imageProduct');
        Route::post('/thambnail/update/{id}' , [ProductsConroller::class , 'updateThambnailProduct'])->name('update.thambnailProduct');

        Route::get('/inActive/{id}' , [ProductsConroller::class , 'inActiveProduct'])->name('inactive.product');
        Route::get('/Active/{id}' , [ProductsConroller::class , 'ActiveProduct'])->name('active.product');


        Route::get('/image/delete/{id}' , [ProductsConroller::class , 'deleteImageProduct'])->name('delete.imageProduct');

    });


    // Sliders Routes

    Route::prefix('slider')->group(function(){
        Route::get('/all' , [SliderController::class , 'allSlider'])->name('all.sliders');
        Route::post('/store' , [SliderController::class , 'storeSlider'])->name('slider.store');
        Route::get('/inActive/{id}' , [SliderController::class , 'inActiveSlider'])->name('inactive.slider');
        Route::get('/Active/{id}' , [SliderController::class , 'ActiveSlider'])->name('active.slider');
        Route::get('/edit/{id}' , [SliderController::class , 'editSlider'])->name('edit.slider');
        Route::post('/update/{id}' , [SliderController::class , 'updateSlider'])->name('slider.update');
        Route::get('/delete/{id}' , [SliderController::class , 'deleteSlider'])->name('slider.delete');


    });


    /// Coupons Routes
    Route::prefix('coupons')->group(function(){
        Route::get('/coupon', [CouponsController::class , 'couponView'])->name('manage.coupons');
        Route::post('/store' , [CouponsController::class , 'storeCoupon'])->name('coupon.store');
        Route::get('/edit/{id}' , [CouponsController::class , 'editCoupon'])->name('coupon.edit');
        Route::post('/update/{id}' , [CouponsController::class , 'updateCoupon'])->name('coupon.update');
        Route::get('/delete/{id}' , [CouponsController::class , 'deleteCoupon'])->name('coupon.delete');


    });

    /// Shipping Area Routes
    Route::prefix('shipping-division')->group(function(){

        //// Shipping Division Routes
        Route::get('/view', [ShippingDivisionContriller::class , 'divisionView'])->name('manage.division');
        Route::post('/store' , [ShippingDivisionContriller::class , 'storeDivision'])->name('division.store');
        Route::get('/edit/{id}' , [ShippingDivisionContriller::class , 'editDivision'])->name('division.edit');
        Route::post('/update/{id}' , [ShippingDivisionContriller::class , 'updateDivision'])->name('division.update');
        Route::get('/delete/{id}' , [ShippingDivisionContriller::class , 'deleteDivision'])->name('division.delete');

        //// Shipping District Routes
        Route::get('/view/district', [ShippingDivisionContriller::class , 'districtView'])->name('manage.district');
        Route::post('/store/district' , [ShippingDivisionContriller::class , 'storeDistrict'])->name('district.store');
        Route::get('/edit/district/{id}' , [ShippingDivisionContriller::class , 'editDistrict'])->name('district.edit');
        Route::post('/update/district/{id}' , [ShippingDivisionContriller::class , 'updateDistrict'])->name('district.update');
        Route::get('/delete/district/{id}' , [ShippingDivisionContriller::class , 'deleteDistrict'])->name('district.delete');

        //// Shipping State Routes
        Route::get('/view/state', [ShippingDivisionContriller::class , 'stateView'])->name('manage.state');
        Route::post('/store/state' , [ShippingDivisionContriller::class , 'storestate'])->name('state.store');
        Route::get('/edit/state/{id}' , [ShippingDivisionContriller::class , 'editstate'])->name('state.edit');
        Route::post('/update/state/{id}' , [ShippingDivisionContriller::class , 'updatestate'])->name('state.update');
        Route::get('/delete/state/{id}' , [ShippingDivisionContriller::class , 'deletestate'])->name('state.delete');
        Route::get('district/ajax/{divition_id}' , [ShippingDivisionContriller::class , 'districtAjax']);



    });

}); // End of Admin Middelware


///// Frontend Routes

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

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

    // Products Details
    Route::get('/product/{slug}/{id}' , [IndexController::class , 'productDetails']);

    // Product Tags
    Route::get('/tags/{tag}' , [IndexController::class , 'productTags'])->name('tage');


    // Product Tags
    Route::get('/subCategory/{slug}/{id}' , [IndexController::class , 'subCategoryView']);
    Route::get('/sub_subCategory/{slug}/{id}' , [IndexController::class , 'sub_subCategoryView']);

    // Product View Model
    Route::get('/product/view/model/{id}' , [IndexController::class , 'productViewModel']);

    // Add To Cart
    Route::post('/cart/data/store/{id}', [AddCartController::class , 'AddToCart']);

    // Get Mini Cart
    Route::get('/cart/mini', [AddCartController::class , 'miniCart']);

    // Remove Mini Cart
    Route::get('/minicart/product-remove/{rowid}', [AddCartController::class , 'removeMiniCart']);

    // Middellware User
    Route::middleware('auth')->group(function(){
        // Whishlist

        Route::get('/wishlist', [wishlistsController::class , 'index'])->name('wishlist');
        Route::post('/add/whishlist/{product_id}', [wishlistsController::class , 'addWhishlist']);
        Route::get('/remove/wishlist/{id}', [wishlistsController::class , 'removeWishlist']);

    });

    // My User Cart
    Route::get('/myCart', [MyCartController::class , 'index'])->name('my_Cart');
    Route::get('/get/my-cart', [MyCartController::class , 'MyCart']);
    Route::get('/remove/cart/{id}', [MyCartController::class , 'removeCart']);
    Route::get('/increase/Qty/{id}', [MyCartController::class , 'increase']);
    Route::get('/decrease/Qty/{id}', [MyCartController::class , 'decrease']);

    // Apply Coupon
    Route::post('/apply/coupon', [MyCartController::class , 'applyCoupon']);
    Route::get('/coupon/calculation', [MyCartController::class , 'calculationCoupon']);
    Route::get('/coupon/remove', [MyCartController::class , 'removeCoupon']);



});




