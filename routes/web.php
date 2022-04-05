<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponsController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ProductsConroller;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnCotroller;
use App\Http\Controllers\Backend\ShippingDivisionContriller;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Frontend\AddCartController;
use App\Http\Controllers\Frontend\ShowBlogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\MyCartController;
use App\Http\Controllers\User\StripeController;
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


    // Blog Routes
    Route::prefix('blog')->group(function(){

        /// Blog Category
        Route::get('/all' , [BlogCategoryController::class , 'allBlog'])->name('all.blog');
        Route::post('/store' , [BlogCategoryController::class , 'storeBlog'])->name('blog.store');
        Route::get('/edit/{id}' , [BlogCategoryController::class , 'editBlog'])->name('edit.blog');
        Route::post('/update/{id}' , [BlogCategoryController::class , 'updateBlog'])->name('blog.update');
        Route::get('/delete/{id}' , [BlogCategoryController::class , 'deleteBlog'])->name('blog.delete');

        //// Blog Posts
        Route::get('/posts' , [BlogCategoryController::class , 'allBlogPosts'])->name('all.posts');
        Route::get('/add/posts' , [BlogCategoryController::class , 'addPost'])->name('add.post');
        Route::post('/post/store' , [BlogCategoryController::class , 'storePost'])->name('post.store');
        Route::get('/post/edit/{id}' , [BlogCategoryController::class , 'editPost'])->name('edit.post');
        Route::post('/post/update/{id}' , [BlogCategoryController::class , 'updatePost'])->name('post.update');
        Route::get('/post/delete/{id}' , [BlogCategoryController::class , 'deletePost'])->name('post.delete');

        Route::post('/update/image/{id}' , [BlogCategoryController::class , 'updateImage'])->name('update.image');


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

    //// Orders Routes
    Route::prefix('orders')->group(function(){
        Route::get('/pending',[OrdersController::class,'pendingOrder'])->name('pending.orders');
        Route::get('/pending/details/{id}',[OrdersController::class,'pendingDetails'])->name('pending.details');

        /// All Action On Orders
        Route::get('/confirmed',[OrdersController::class,'confirmedOrder'])->name('confirm.orders');
        Route::get('/processing',[OrdersController::class,'processingOrder'])->name('processing.orders');
        Route::get('/picked',[OrdersController::class,'pickedOrder'])->name('picked.orders');
        Route::get('/delivered',[OrdersController::class,'deliveredOrder'])->name('delivered.orders');
        Route::get('/shipping',[OrdersController::class,'shippingOrder'])->name('shipping.orders');
        Route::get('/cancel',[OrdersController::class,'cancelOrder'])->name('cancel.orders');

        /// Update Status
        Route::get('/pending/{type}/{id}',[OrdersController::class,'pending_confirm'])->name('pending-confirm');

        /// Order Admin Invoice
        Route::get('/invoice/{id}',[OrdersController::class,'adminInvoice'])->name('admin.invoice');

    });


    //// Reports Routes
    Route::prefix('report')->group(function(){
        Route::get('/view',[ReportController::class,'reportView'])->name('all.report');

        /// Searching
        Route::post('/search/date',[ReportController::class,'reportByDate'])->name('date.search');
        Route::post('/search/month',[ReportController::class,'reportByMonth'])->name('month.search');
        Route::post('/search/year',[ReportController::class,'reportByYear'])->name('year.search');


    });


    //// Reports Routes
    Route::prefix('users')->group(function(){
        Route::get('/view',[AdminProfileController::class,'allUsers'])->name('all.users');
    });


    //// Site Setting Routes
    Route::prefix('setting')->group(function(){
        Route::get('/site',[SiteSettingController::class,'siteSetting'])->name('site.setting');
        Route::post('/site/update/{id}',[SiteSettingController::class,'updateSite'])->name('site.update');

        /// SEO Routes
        Route::get('/seo',[SiteSettingController::class,'seoSite'])->name('seo.setting');
        Route::post('/seo/update/{id}',[SiteSettingController::class,'updateSeo'])->name('seo.update');
    });


    //// Return Orders Routes
    Route::prefix('return')->group(function(){
        Route::get('/view',[ReturnCotroller::class,'index'])->name('view.return');
        Route::get('/all',[ReturnCotroller::class,'allRequest'])->name('all.request');
        Route::get('/approve/{id}',[ReturnCotroller::class,'approveRequest'])->name('approve.returned');

    });

}); // End of Admin Middelware


///// Frontend Routes

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    // User Routes

    Route::middleware(['auth:sanctum,web', 'verified','user'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/' , [IndexController::class , 'index']);

    Route::middleware('user')->group(function(){
        Route::get('/user/logout' , [IndexController::class , 'userLogout'])->name('user.logout');
        Route::get('/user/profile' , [IndexController::class , 'userProfile'])->name('user.profile');
        Route::post('/update/user' , [IndexController::class , 'updateUserProfile'])->name('user.profile.store');
        Route::get('/change/user/password' , [IndexController::class , 'updateUserPassword'])->name('user.change.password');
        Route::post('/update/user/password' , [IndexController::class , 'changeUserPassword'])->name('user.update.password');
    });

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

        //// Stripe Order
        Route::post('/stripe/order', [StripeController::class , 'stripeOrder'])->name('stripe.order');

        //// Cash Order
        Route::post('/cash/order', [CashController::class , 'cashOrder'])->name('cash.order');

        //// View User Orders
        Route::get('/my/orders', [StripeController::class , 'myOrders'])->name('my.orders');
        Route::get('/returned/orders', [StripeController::class , 'returnedOrders'])->name('returned.orders');
        Route::get('/canceled/orders', [StripeController::class , 'canceledOrders'])->name('canceled.orders');

        Route::get('/order/details/{id}', [StripeController::class , 'orderDetails'])->name('order.details');
        Route::get('/order/invoice/{id}', [StripeController::class , 'orderInvoice'])->name('order.invoice');

        //// Return Orders
        Route::post('/order/return/{id}', [OrdersController::class , 'orderReturn'])->name('return.order');




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

    // Checkout Page
    Route::get('/checkout', [CheckoutController::class , 'index'])->name('checkout');
    Route::get('district/ajax/{divition_id}' , [CheckoutController::class , 'districtAjax']);
    Route::get('state/ajax/{district_id}' , [CheckoutController::class , 'stateAjax']);
    Route::post('/checkout/store' , [CheckoutController::class , 'checkoutStore'])->name('checkout.store');

    /// Blog Route Frontend
    Route::get('/view', [ShowBlogController::class , 'index'])->name('user.blog');
    Route::get('/{slug}/{id}', [ShowBlogController::class , 'postDetails']);

    Route::get('/blog/category/post/{category_id}', [ShowBlogController::class , 'blogCategory']);






});

Route::fallback(function(){
    return view('fontend.404');
});




