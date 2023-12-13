<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ReviewController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ----------------------Admin Panel Routes-------------------------

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('dashboard/profiledetails', [App\Http\Controllers\Admin\DashboardController::class, 'profiledetails']);
    Route::get('dashboard/profiledetails/{id}/delete', [App\Http\Controllers\Admin\DashboardController::class, 'remove'])
    ->name('admin.dashboard.profiledetails.delete');


    
    // ----------------------Category Routes-------------------------
    
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('/category/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::put('/category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::get('category/{id}/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])
        ->name('admin.category.delete');
    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);
        Route::get('/orders/{orederId}', [App\Http\Controllers\Admin\OrderController::class, 'show']);
    });

    // ----------------------Product Routes-------------------------
    
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
        Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
        Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store']);
        Route::post('/products/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
        Route::put('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
        Route::get('product-image/{product_image_id}/delete', [App\Http\Controllers\Admin\ProductController::class,'destroyImage']);
        Route::get('/products/{product_id}/delete', [App\Http\Controllers\Admin\ProductController::class,'destroy']);
    });

});

// --------------------Customer Panel Routes------------------

Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\User\UserController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\User\UserController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\User\UserController::class, 'productView']);
Route::get('/search', [App\Http\Controllers\User\UserController::class, 'searchProducts']);
Route::get('/popular-products', [App\Http\Controllers\User\UserController::class,'popularProducts']);
Route::get('/wishlist', [App\Http\Controllers\User\UserController::class, 'wishlistProducts']);
Route::get('/wishlist/{id}/delete', [App\Http\Controllers\User\UserController::class,'finish']);



//------------------------User Profile Routes----------------------//

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index']);
    Route::post('/profile', [App\Http\Controllers\User\ProfileController::class, 'updateProfileDetails']);
    Route::get('/reviews/{productId}', [App\Http\Controllers\User\ReviewController::class,'index']);
    Route::get('/reviews', [App\Http\Controllers\User\ReviewController::class,'store']);
});


//-----------------------Wallet Implementation-------------------//
// Route::get('/wallet', Wallet::class)->name('wallet');
Route::middleware(['auth'])->group(function () {
    Route::get('/wallet/show_balance', [WalletController::class, 'showBalance'])->name('show_balance');
    Route::get('/wallet/admin_balance', [WalletController::class, 'adminBalance'])->name('wallet.adminBalance');
    Route::get('/wallet/place-order', [WalletController::class, 'placeOrder'])->name('place-order');
    Route::get('/wallet/redirect-to-category', [WalletController::class, 'redirectToCategory'])->name('redirect-to-category');
    Route::get('/wallet/add_money', [WalletController::class, 'showAddMoneyForm'])->middleware('isAdmin')->name('wallet.showAddMoneyForm');
    Route::post('/wallet/add_money', [WalletController::class, 'addMoney'])->middleware('isAdmin')->name('wallet.addMoney');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart',[App\Http\Controllers\User\CartController::class,'index'])->name('cart');
    Route::get('/checkout',[App\Http\Controllers\User\CheckoutController::class,'index'])->name('checkout');
    Route::get('/orders', [App\Http\Controllers\User\OrderController::class, 'index']);
    Route::get('/orders/{orederId}', [App\Http\Controllers\User\OrderController::class, 'show']);
});

Route::prefix('reviews')->group(function () {
    Route::get('/{product_id}', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/store', [ReviewController::class, 'store'])->name('reviews.store');
});

