<?php

use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('auth.userlogin');
// });



//Route::get('/user/login/{id}', [UserController::class, 'userlogin']);
Route::get('/admin', function () {
    return view('auth.adminlogin');
    // return view('welcome');
});

Auth::routes();
// Route::get('/login', [LoginController::class, 'index'])->name('userlogin');
Route::get('/', [LoginController::class, 'index'])->name('userlogin');
Route::post('login/loginsubmit', [LoginController::class, 'loginsubmit']);

Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('user/login', [UserController::class, 'login']);
    Route::get('user/realestate/home', [HomeController::class, 'index'])->name('home');
    Route::get('/invetment/home', [HomeController::class, 'investment'])->name('investment');
    Route::get('/software/home', [HomeController::class, 'software'])->name('software');
    Route::get('/user/realestate/customer/call', [RealEstateCustomerController::class, 'index']);
    Route::get('/user/realestate/customer/newcustomercall/{id}', [RealEstateCustomerController::class, 'newcustomercall']);
    Route::get('/user/realestate/customer/customercallback/{id}', [RealEstateCustomerController::class, 'customercallback']);
    Route::get('/user/realestate/customer/meetinglist', [RealEstateCustomerController::class, 'meetinglist']);
    Route::get('/user/realestate/customer/allleads', [RealEstateCustomerController::class, 'allleads']);
    Route::get('/user/realestate/customer/addcustomer', [RealEstateCustomerController::class, 'addcustomer']);
    Route::get('/user/realestate/customer/followuplist', [RealEstateCustomerController::class, 'followuplist']);
    Route::get('/user/realestate/customer/upcomingpfollowup', [RealEstateCustomerController::class, 'upcomingpfollowup']);
    Route::get('/user/realestate/customer/previousfollowup', [RealEstateCustomerController::class, 'previousfollowup']);
    Route::get('/user/realestate/customer/previousmeeting', [RealEstateCustomerController::class, 'previousmeeting']);
    Route::get('/user/realestate/customer/upcomingmeeting', [RealEstateCustomerController::class, 'upcomingmeeting']);
    Route::get('/user/realestate/customer/sellslist', [RealEstateCustomerController::class, 'sellslist']);
    Route::get('/user/realestate/customer/callback', [RealEstateCustomerController::class, 'callback']);
    Route::get('/user/realestate/customer/wrongnumber', [RealEstateCustomerController::class, 'wrongnumber']);
    Route::get('/user/realestate/customer/notanswered', [RealEstateCustomerController::class, 'notanswered']);
    Route::get('/user/realestate/customer/switchoff', [RealEstateCustomerController::class, 'switchoff']);
    Route::get('/user/realestate/customer/busy', [RealEstateCustomerController::class, 'busy']);
    Route::get('/user/realestate/customer/disconneted', [RealEstateCustomerController::class, 'disconneted']);
    Route::post('/user/realestate/customer/callinfosubmit', [RealEstateCustomerController::class, 'callinfosubmit']);
    Route::post('user/realestate/customer/callinfoupdatesubmit', [RealEstateCustomerController::class, 'callinfoupdatesubmit']);
    Route::post('user/realestate/customer/followupsubmit', [RealEstateCustomerController::class, 'followupsubmit']);
    Route::post('user/realestate/customer/meetingsubmit', [RealEstateCustomerController::class, 'meetingsubmit']);
    Route::post('user/realestate/customer/newcustomerinfosubmit', [RealEstateCustomerController::class, 'newcustomerinfosubmit']);
    Route::post('/user/realestate/customer/siteviewsubmit', [RealEstateCustomerController::class, 'siteviewsubmit']);
    Route::post('user/realestate/customer/statussubmit', [RealEstateCustomerController::class, 'statussubmit']);
    Route::post('user/realestate/customer/referencesearch', [RealEstateCustomerController::class, 'referencesearch']);
    Route::post('user/realestate/customer/realestatecustomerimport', [RealEstateCustomerController::class, 'realestatecustomerimport']);
    Route::post('user/realestate/customer/sendemail', [RealEstateCustomerController::class, 'sendemail']);
    Route::get('user/realestate/customer/allnewcustomerlist', [RealEstateCustomerController::class, 'allnewcustomerlist']);
    Route::get('/user/realestate/customer/leadsupdate/{id}', [RealEstateCustomerController::class, 'leadsupdate']);
    Route::get('/user/realestate/customer/sellsdetail/{id}', [RealEstateCustomerController::class, 'sellsdetail']);
    Route::post('user/realestate/customer/infoupdate/{id}', [RealEstateCustomerController::class, 'customerinfoupdate']);
    Route::post('user/realestate/customer/propertychoiceinfoupdate', [RealEstateCustomerController::class, 'propertychoiceinfoupdate']);
    Route::post('user/realestate/customer/basicinfosubmit', [RealEstateCustomerController::class, 'basicinfosubmit']);
    Route::post('user/realestate/customer/sellinginfosubmit', [RealEstateCustomerController::class, 'sellinginfosubmit']);
});

/*------ ------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------/
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/user/userlist', [UserController::class, 'userlist']);
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
