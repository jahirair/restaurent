<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('home');
// });

 Route::get('/home',[HomeController::class,'home'])->name('home');
 Route::get('/',[HomeController::class,'index'])->name('root');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        //return view('home');
        return redirect()->route( 'root' );
    })->name('dashboard');
});

Route::get('/logout', [HomeController::Class, 'perform']);
Route::post('/addcart/{id}', [HomeController::class,'addcart'])->name('addcart');
Route::get('/mycart', [HomeController::class,'mycart'])->name('mycart');
Route::get('/deletecart/{id}', [HomeController::class,'deletecart'])->name('deletecart');
Route::get('/shippingform', [HomeController::class,'shippingform'])->name('shippingform');
Route::post('/storeshipping', [HomeController::class,'storeshipping'])->name('storeshipping');
Route::get('/storeorder', [HomeController::class,'storeorder'])->name('storeorder');

// ==================== Admin Controller====================

Route::get('/admindashboard', [AdminController::class,'admindashboard'])->name('admindashboard');
Route::get('/users', [AdminController::class,'users'])->name('users');
Route::get('/deleteuser/{user_id}', [AdminController::class,'deleteuser'])->name('deleteuser');
Route::get('/add-food-item', [AdminController::class,'addfood'])->name('addfood');
Route::post('/store-food-item', [AdminController::class,'storefood'])->name('storefood');
Route::get('/all-food-item', [AdminController::class,'allfoods'])->name('allfoods');
Route::get('/delete-food/{id}', [AdminController::class,'deletefood'])->name('deletefood');
Route::get('/edit-food/{id}', [AdminController::class,'editfood'])->name('editfood');
Route::post('/update-food/{id}', [AdminController::class,'updatefood'])->name('updatefood');
Route::get('/all-orders', [AdminController::class,'allorders'])->name('allorders');
Route::get('/delete-order/{id}', [AdminController::class,'deleteorder'])->name('deleteorder');
Route::post('/search-order', [AdminController::class,'searchorder'])->name('searchorder');

Route::get('/search-order-ajax', [AdminController::class,'searchorderajax'])->name('searchorderajax');
Route::get('/add-customer', [AdminController::class,'addcustomer'])->name('addcustomer');
Route::post('/store-customer', [AdminController::class,'storecustomer'])->name('storecustomer');
Route::get('/all-customer', [AdminController::class,'allcustomer'])->name('allcustomer');
Route::get('/delete-customer/{id}', [AdminController::class,'deletecustomer'])->name('deletecustomer');
Route::delete('/delete-customer-ajax/{id}', [AdminController::class,'deletecustomerajax'])->name('deletecustomerajax');




Route::post('/store-reservation', [AdminController::class,'storereservation'])->name('storereservation');
Route::get('/all-reservations', [AdminController::class,'allreservations'])->name('allreservations');
Route::get('/delete-reservation/{id}', [AdminController::class,'deletereservation'])->name('deletereservation');
Route::get('/add-chef-item', [AdminController::class,'addchef'])->name('addchef');
Route::post('/store-chef', [AdminController::class,'storechef'])->name('storechef');
Route::get('/all-chefs', [AdminController::class,'allchefs'])->name('allchefs');
Route::get('/delete-chef/{id}', [AdminController::class,'deletechef'])->name('deletechef');
