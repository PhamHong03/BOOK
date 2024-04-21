<?php

use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ImportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuControllers;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\UserController;

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
#client

Route::get('/', [HomeController::class, 'index'])->name('client.index');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/users/login',[LoginController::class,'index'])->name('admin-login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::get('/sign-out', [LoginController::class, 'sign_out'])->name('sign-out');



Route::middleware(['admin'])->group(function() {

    Route::prefix('admin')->group(function() {

        Route::get('/',[MainController::class,'index1'])->name('admin');

        Route::get('main',[MainController::class,'index']);   
    
        #Menu
        Route::prefix('menus')->group(function (){
            Route::get('add', [MenuController::class, 'create'])->name('add');
            
            Route::post('add', [MenuController::class, 'store']);

            Route::get('list', [MenuController::class, 'index'])->name('list');
           
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
    
        });

        #Product
        Route::prefix('products')->group(function() {
            
            Route::get('add', [ProductController::class, 'create'])->name('add-products');

            Route::post('add', [ProductController::class, 'store']);
            
            Route::get('list', [ProductController::class, 'index'])->name('list-products');
            
            Route::get('edit/{product}', [ProductController::class, 'show']);
            
            Route::post('edit/{product}', [ProductController::class, 'update']);

            Route::DELETE('destroy', [ProductController::class, 'destroy']);

        });

        #Slider
        Route::prefix('sliders')->group(function() {
            
            Route::get('add', [SliderController::class, 'create'])->name('add-sliders');

            Route::post('add', [SliderController::class, 'store']);
            
            Route::get('list', [SliderController::class, 'index'])->name('list-sliders');
            
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            
            Route::post('edit/{slider}', [SliderController::class, 'update']);

            Route::DELETE('destroy', [SliderController::class, 'destroy']);

        });

        #upload
        Route::post('upload/services', [UploadController::class, 'store']);


        #author
        Route::prefix('author')->group(function () {
            
        });

        #import
        Route::prefix('importGoods')->group(function () {
            Route::get('add', [ImportController::class, 'index']);
        });

        #cart
        Route::get('customers', [AdminCartController::class,'index']);
        Route::get('customers/view/{customer}', [AdminCartController::class, 'show']);
        Route::post('customers/view/{customer}', [AdminCartController::class, 'show']);

        Route::get('customers/edit/{customer}', [AdminCartController::class, 'editCart']);
        Route::post('customers/edit/{customer}', [AdminCartController::class, 'update']);

        Route::DELETE('customers/destroy', [AdminCartController::class, 'destroy'])->name('customers.destroy');
        Route::post('customers/view/delivery', [AdminCartController::class, 'delivery'])->name('delivery');


        Route::get('approve', [AdminCartController::class, 'approve'])->name('approve');
        Route::get('cancel', [AdminCartController::class, 'cancel'])->name('cancel');
        Route::get('wait', [AdminCartController::class, 'wait'])->name('wait');
        Route::get('giaodon', [AdminCartController::class, 'giaodon'])->name('giaodon');

        #account
        Route::get('account', [AuthorController::class, 'account']);
        Route::get('account/edit/{user}', [AuthorController::class, 'show']);
        Route::post('account/edit/{user}', [AuthorController::class, 'update']);

        #thongke
        Route::get('thongke', [AdminCartController::class, 'thongke']);
        Route::get('doanhthu', [AdminCartController::class, 'doanhthu']);

    });    
   
});

Route::get('test-email', [MainController::class,'testEmail']);

Route::get('/', [MainController::class, 'index'])->name('bookstore');

Route::get('/products', [MainController::class, 'products'])->name('products');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::post('/services/load-product', [MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html',[MenuControllers::class, 'index']);

Route::get('san-pham/{id}.html', [ProductControllers ::class, 'index'])->name('san-pham');

Route::get('tim-kiem', [MainController::class, 'getSearch'])->name('search');

Route::get('carts', [CartController::class, 'show'])->name('carts');

Route::middleware('checkLogin')->post('add-cart',[CartController::class, 'index']);

Route::post('carts', [CartController::class, 'addCart']);

// Route::post('add-cart', [CartController::class, 'index']);

Route::post('/update-cart', [CartController::class, 'update']);

Route::get('carts/delete/{id}', [CartController::class, 'remove']);

Route::post('carts/delete', [CartController::class, 'removeAll'])->name('carts/delete');

// Route::get('carts/order', [CartController::class, 'detailOrder'])->name('carts/detail');

Route::get('order-cart', [OrderController::class, 'order'])->name('order');
Route::post('order-cart', [OrderController::class, 'order'])->name('order');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'postRegister']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'postLogin']);

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('profile', [HomeController::class, 'profile'])->name('profile');
// Route::get('/forgotPW', [AuthManagerController::class, 'forgotPW'])->name('forgotPW');


// Route::get('/category', [CategoryController::class, 'index'])->name('index');
// Route::get('/category/create', [CategoryController::class, 'create'])->name('create');


