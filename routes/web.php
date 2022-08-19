<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomProductController;
use App\Http\Controllers\CustomCategoryController;

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


Route::get('/', [MenuController::class, 'indexBeforeLogin'])->name('indexBeforeLogin');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/storefoodreview', [MenuController::class, 'storeFoodReview'])->name('storefoodreview');

//Show Select Menu Page
Route::get('/selectmenu', [MenuController::class, 'viewselectmenu'])->name('selectmenu');

//Show Default Menu Page
Route::get('/menu', [MenuController::class, 'viewdefaultmenu'])->name('viewmenu');
Route::get('/menu/{id}', [MenuController::class, 'viewProduct'])->name('menu');

//Show Custom Menu Page
Route::get('/createsushi', [MenuController::class, 'viewcustommenu'])->name('createownsushi');

//Custom Sushi Result Page
Route::post('/createsushi/finish', [MenuController::class, 'sushicreation'])->name('createsushi');

//Show Food Item Details
Route::get('/viewitem/{product}', [MenuController::class, 'viewitem'])->name('viewitem');

//View Payment Page
Route::get('/payment', [PaymentController::class, 'viewpayment'])->name('viewPayment');

//View Receipt Page
Route::get('/receipt', [PaymentController::class, 'viewreceipt'])->name('showReceipt');
Route::post('/receipt/reviewstore', [PaymentController::class, 'storeReview'])->name('serviceReview');

//View Order History Page
Route::get('/orderhistory', [AdminController::class, 'vieworderhistory'])->name('orderhistory')->middleware('auth');
Route::get('/orderhistory/clearall', [AdminController::class, 'clearorderhistory'])->name('clearorderhistory')->middleware('auth');

//View Single Past Order
Route::get('/orderhistory/{id}', [AdminController::class, 'viewpastorder'])->name('pastorder')->middleware('auth');

//View Manage Order Page
Route::get('/manageorder', [AdminController::class, 'viewmanageorder'])->name('manageorder')->middleware('auth');

//View View Single Order
Route::get('/manageorder/{id}', [AdminController::class, 'vieworder'])->name('vieworder')->middleware('auth');
Route::post('/manageorder/update', [AdminController::class, 'updateorderstatus'])->name('updateorder')->middleware('auth');

//View Admin Management Page / Portal
Route::get('/adminportal', [AdminController::class, 'viewadminportal'])->name('adminportal')->middleware('auth');

//View Reviews
Route::get('/viewReviews/all', [AdminController::class, 'viewallreviews'])->name('viewallreviews')->middleware('auth');
Route::get('/viewReviews/all/foodreviews', [AdminController::class, 'viewallfoodreviews'])->name('viewallfoodreviews')->middleware('auth');
Route::get('/viewReviews/all/foodreviews/delete{id}', [AdminController::class, 'deletefoodreview'])->name('deletefoodreview')->middleware('auth');
Route::get('/viewReviews/all/orderreviews', [AdminController::class, 'viewallorderreviews'])->name('viewallorderreviews')->middleware('auth');
Route::get('/viewReviews/all/orderreviews/delete{id}', [AdminController::class, 'deleteorderreview'])->name('deleteorderreview')->middleware('auth');

//Search Order
Route::get('/trackorder', [MenuController::class, 'viewtrackorder'])->name('viewtrackorder');
Route::post('/trackorder/search', [MenuController::class, 'searchtrackorder'])->name('searchEmail');
Route::get('/trackorder/view/{id}', [MenuController::class, 'viewsingletrackorder'])->name('viewsingletrackorder');

//----------------------------------------DEFAULT MENU CRUD

Route::get('/product/show', [ProductController::class, 'view'])->name('viewAdminProduct')->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->name('addProduct')->middleware('auth');
Route::get('/product/show/delete{id}', [ProductController::class, 'delete'])->name('deleteProduct')->middleware('auth');
Route::post('/product/update', [ProductController::class, 'update'])->name('updateProduct')->middleware('auth');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('editProduct')->middleware('auth');

//View Add Menu Product
Route::get('/product/add', [ProductController::class, 'add'])->name('adminadddefaultmenu')->middleware('auth');
//----------------------------------------CUSTOM MENU CRUD

Route::get('/customproduct/show', [CustomProductController::class, 'view'])->name('viewAdminCustomProduct')->middleware('auth');
Route::post('/customproduct/store', [CustomProductController::class, 'store'])->name('addCustomProduct')->middleware('auth');
Route::get('/customproduct/show/delete{id}', [CustomProductController::class, 'delete'])->name('deleteCustomProduct')->middleware('auth');
Route::post('/customproduct/update', [CustomProductController::class, 'update'])->name('updateCustomProduct')->middleware('auth');
Route::get('/customproduct/{id}/edit', [CustomProductController::class, 'edit'])->name('editCustomProduct')->middleware('auth');

//View Add Custom Menu Product
Route::get('/customproduct/add', [CustomProductController::class, 'add'])->name('adminaddcustommenu')->middleware('auth');
//----------------------------------------DEFAULT CATEGORY CRUD

Route::get('/category/show', [CategoryController::class, 'view'])->name('viewAdminCategory')->middleware('auth');
Route::get('/category/show/delete{id}', [CategoryController::class, 'delete'])->name('deleteCategory')->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('addCategory')->middleware('auth');
Route::post('/category/update', [CategoryController::class, 'update'])->name('updateCategory')->middleware('auth');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('editCategory')->middleware('auth');

//View Add Category
Route::get('/category/add', [CategoryController::class, 'add'])->name('admindefaultaddcat')->middleware('auth');

//----------------------------------------CUSTOM CATEGORY CRUD

Route::get('/customcategory/show', [CustomCategoryController::class, 'view'])->name('viewAdminCustomCategory')->middleware('auth');
Route::get('/customcategory/show/delete{id}', [CustomCategoryController::class, 'delete'])->name('deleteCustomCategory')->middleware('auth');
Route::post('/customcategory/store', [CustomCategoryController::class, 'store'])->name('addCustomCategory')->middleware('auth');
Route::post('/customcategory/update', [CustomCategoryController::class, 'update'])->name('updateCustomCategory')->middleware('auth');
Route::get('/customcategory/{id}/edit', [CustomCategoryController::class, 'edit'])->name('editCustomCategory')->middleware('auth');

//View Add Custom Category
Route::get('/customcategory/add', [CustomCategoryController::class, 'add'])->name('admincustomaddcat')->middleware('auth');

//Payment Storing Data
Route::post('payment/store', [PaymentController::class, 'paymentPost'])->name('paymentPost');
Route::post('payment/stores', [PaymentController::class, 'paymentLater'])->name('unpaidPost');

