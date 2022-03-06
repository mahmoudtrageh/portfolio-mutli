<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;

use App\Http\Controllers\Backend\AllUsersController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\TestmonialController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactsController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;

use App\Http\Controllers\User\AllUserController;


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

/*  ------------------ Admin Routes ------------------  */

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
});

Route::middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

        Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');

        Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');

        Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

        Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

        Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

        Route::post('/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

        Route::get('/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

        Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

        // All User Routes 
        Route::prefix('alluser')->group(function () {
            Route::get('/view/users', [AllUsersController::class, 'AllUsers'])->name('all-users');
            Route::get('/add', [AllUsersController::class, 'AddUserRole'])->name('add.user');

            Route::post('/store', [AllUsersController::class, 'StoreUserRole'])->name('admin.user.user.store');

            Route::get('/edit/{id}', [AllUsersController::class, 'EditUserRole'])->name('edit.admin.user.user');

            Route::post('/update', [AllUsersController::class, 'UpdateUserRole'])->name('admin.user.user.update');

            Route::get('/delete/{id}', [AllUsersController::class, 'DeleteUserRole'])->name('delete.admin.user.user');

            Route::get('/view/sellers', [AllUsersController::class, 'AllSellers'])->name('all-sellers');

            Route::get('/seller/add', [AllUsersController::class, 'AddSellerRole'])->name('add.seller');

            Route::post('/seller/store', [AllUsersController::class, 'StoreSellerRole'])->name('admin.seller.store');

            Route::get('/seller/edit/{id}', [AllUsersController::class, 'EditSellerRole'])->name('edit.admin.seller');

            Route::post('/seller/update', [AllUsersController::class, 'UpdateSellerRole'])->name('admin.seller.update');

            Route::get('/seller/delete/{id}', [AllUsersController::class, 'DeleteSellerRole'])->name('delete.admin.seller');
        });
        // all user routes 

        // Admin Brand All Routes 

        Route::prefix('brand')->group(function () {

            Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');

            Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

            Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

            Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

            Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
        });

         // Admin clients All Routes 

         Route::prefix('clients')->group(function () {

            Route::get('/view', [ClientsController::class, 'ClientView'])->name('all.client');

            Route::post('/store', [ClientsController::class, 'ClientStore'])->name('client.store');

            Route::get('/edit/{id}', [ClientsController::class, 'ClientEdit'])->name('client.edit');

            Route::post('/update', [ClientsController::class, 'ClientUpdate'])->name('client.update');

            Route::get('/delete/{id}', [ClientsController::class, 'ClientDelete'])->name('client.delete');
        });

        // Admin User Role Routes 
        Route::prefix('adminuserrole')->group(function () {

            Route::get('/all', [RolesController::class, 'AllAdminRole'])->name('all.admin.user');

            Route::get('/add', [RolesController::class, 'AddAdminRole'])->name('add.admin');

            Route::post('/store', [RolesController::class, 'StoreAdminRole'])->name('admin.user.store');

            Route::get('/edit/{id}', [RolesController::class, 'EditAdminRole'])->name('edit.admin.user');

            Route::post('/update', [RolesController::class, 'UpdateAdminRole'])->name('admin.user.update');

            Route::get('/delete/{id}', [RolesController::class, 'DeleteAdminRole'])->name('delete.admin.user');
        });
        // admin user role end 


        // Admin Category all Routes  
        Route::prefix('category')->group(function () {

            Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

            Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

            Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

            Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

            Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');


            // Admin Sub Category All Routes

            Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

            Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

            Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

            Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

            Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        });

        // Admin Products All Routes 

        Route::prefix('product')->group(function () {

            Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

            Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
            Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

            Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

            Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');

            Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

            Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');

            Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

            Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

            Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

            Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        });

        // Admin Coupons All Routes 

        Route::prefix('coupons')->group(function () {

            Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');

            Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

            Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
            Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

            Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
        });


        // Admin Shipping All Routes 

        Route::prefix('shipping')->group(function () {

            // Ship Division 
            Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

            Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

            Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

            Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

            Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
        });

        // Admin Order All Routes 

        Route::prefix('orders')->group(function () {

            Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');

            Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

            Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

            Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

            Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

            Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

            Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

            Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

            // Update Status 
            Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

            Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

            Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

            Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

            Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

            Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
        });

        // Admin Reports Routes 
        Route::prefix('reports')->group(function () {

            Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

            Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

            Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

            Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
        });


        // Admin Site Setting Routes 
        Route::prefix('setting')->group(function () {

            Route::get('/site', [SettingController::class, 'SiteSetting'])->name('site.setting');
            Route::post('/site/update', [SettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');

            Route::get('/seo', [SettingController::class, 'SeoSetting'])->name('seo.setting');

            Route::post('/seo/update', [SettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
        });


        // Admin Manage Stock Routes 
        Route::prefix('stock')->group(function () {

            Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
        });

        // Admin Slider All Routes 

        Route::prefix('slider')->group(function () {

            Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');

            Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

            Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

            Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

            Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');

            Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        });

        // Admin Blog  Routes 
        Route::prefix('blog')->group(function () {

            Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');

            Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');

            Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');


            Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');

            // Admin View Blog Post Routes 

            Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');

            Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');

            Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');
        });

        // Admin Return Order Routes 
        Route::prefix('return')->group(function () {

            Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');

            Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

            Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
        });
        
        // Admin Manage Review Routes 
        Route::prefix('review')->group(function () {

            Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

            Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

            Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

            Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
        });

        /// For portfolio Route
        Route::prefix('portfolio')->group(function () {
            Route::get('/portfolio/all', [PortfolioController::class, 'AllPortfolio'])->name('all.portfolio');
            Route::post('/portfolio/add', [PortfolioController::class, 'StorePortfolio'])->name('store.portfolio');
            Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'Edit'])->name('edit.portfolio');
            Route::post('/portfolio/update/{id}', [PortfolioController::class, 'Update'])->name('update.portfolio');
            Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'Delete'])->name('delete.portfolio');
        });

        /// For service Route
        Route::prefix('services')->group(function () {

            Route::get('/service/all', [ServiceController::class, 'AllService'])->name('all.service');
            Route::post('/service/add', [ServiceController::class, 'StoreService'])->name('store.service');
            Route::get('/service/edit/{id}', [ServiceController::class, 'EditService'])->name('edit.service');
            Route::post('/service/update/{id}', [ServiceController::class, 'Update'])->name('update.service');
            Route::get('/service/delete/{id}', [ServiceController::class, 'Delete'])->name('delete.service');
        });

        /// For testmonial Route
        Route::prefix('testmonials')->group(function () {

            Route::get('/testmonial/all', [TestmonialController::class, 'AllTestmonial'])->name('all.testmonial');
            Route::post('/testmonial/add', [TestmonialController::class, 'StoreTestmonial'])->name('store.testmonial');
            Route::get('/testmonial/edit/{id}', [TestmonialController::class, 'Edit'])->name('edit.testmonial');
            Route::post('/testmonial/update/{id}', [TestmonialController::class, 'Update'])->name('update.testmonial');
            Route::get('/testmonial/delete/{id}', [TestmonialController::class, 'Delete'])->name('delete.testmonial');
        });

        // Home About All Route
        Route::prefix('about')->group(function () {
            Route::get('/about/edit/', [AboutController::class, 'EditAbout'])->name('edit.about');
            Route::post('/update/homeabout/', [AboutController::class, 'UpdateAbout'])->name('update.about');
        });

        // Amdin Contact Page Route 
        Route::prefix('contact')->group(function () {
            Route::get('/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
        });

        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);

    });
});
// end admin middleware

Route::get('/getAllPermission', [PermissionController::class, 'getAllPermissions']);
Route::post('/postRole', [RoleController::class, 'store']);
Route::post('/updateRole/{id}', [RoleController::class, 'update'])->name('role.update');
Route::get('/deleteRole/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
Route::post('/updatePermission/{id}', [PermissionController::class, 'update'])->name('permission.update');
Route::get('/deletePermission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
/*  ------------------ End Admin Routes ------------------  */

/* ----------------- site ------------------ */
Route::get('/', [IndexController::class, 'Home'])->name('home');
Route::get('/blog', [IndexController::class, 'BlogView'])->name('blog.view');
Route::get('/blog/post/{id}', [IndexController::class, 'BlogPost'])->name('blog.post');
Route::get('/blog/category/post/{category_id}', [IndexController::class, 'HomeBlogCatPost']);

Route::get('/shop', [IndexController::class, 'ShopView'])->name('shop.view');

Route::get('/profile/{id}', [IndexController::class, 'ProfileView'])->name('profile.view');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');

Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.details');

Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');

// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to 
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


/////////////////////  User Must Login  ////
Route::group(['prefix' => 'user', 'middleware' => 'auth', 'namespace' => 'User'], function () {

    // Wishlist page

    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails'])->name('order.details');

    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
});




// My Cart Page All Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);


// Frontend Coupon Option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Routes 

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

/// Home Contact Page Route 
Route::get('/contact', [ContactsController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactsController::class, 'ContactForm'])->name('contact.form');

require __DIR__ . '/auth.php';
