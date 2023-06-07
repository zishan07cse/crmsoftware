<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RealEstateCustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    //return view('auth.login');
    return view('welcome');
});

Route::get('/admin', function () {
    return view('auth.adminlogin');
    // return view('welcome');
});
Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('user/realestate/home', [HomeController::class, 'index'])->name('home');
    Route::get('/invetment/home', [HomeController::class, 'investment'])->name('investment');
    Route::get('/software/home', [HomeController::class, 'software'])->name('software');
    Route::get('user/realestate/customer/call', [RealEstateCustomerController::class, 'index']);
    Route::post('user/realestate/customer/callinfosubmit', [RealEstateCustomerController::class, 'callinfosubmit']);
    Route::post('user/realestate/customer/followupsubmit', [RealEstateCustomerController::class, 'followupsubmit']);
    Route::post('user/realestate/customer/meetingsubmit', [RealEstateCustomerController::class, 'meetingsubmit']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------/
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/user/userlist', [UserController::class, 'index']);
    Route::get('/admin/user/create', [UserController::class, 'create']);
    Route::post('/admin/user/store', [UserController::class, 'store']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

//Route::resource('admin/user', UserController::class);
