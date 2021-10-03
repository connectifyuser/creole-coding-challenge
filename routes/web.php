<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');
    Route::post('/update-profile', [UserController::class, 'updateUserProfile'])->name('updateprofile');
    Route::get('/change-password-view', [UserController::class, 'chagePasswordView'])->name('changepasswordview');
    Route::post('/change-password', [UserController::class, 'changeUserPassword'])->name('changepassword');
    Route::get('/address-view', [UserController::class, 'addressView'])->name('addressview');
    Route::post('/update_profile', [UserController::class, 'updateProfilePicture'])->name('updatepicture');
    Route::get('/add-address-view', [UserController::class, 'addUserAddressView'])->name('addaddressview');

    Route::post('/add-addresses', [UserController::class, 'addUserAddress'])->name('addaddresses');

    Route::get('/addresses', [UserController::class, 'addresses'])->name('address');
    Route::get('/edit-address-view/{id}', [UserController::class, 'editAddressView'])->name('edit-address-view');
    Route::post('/address-update', [UserController::class, 'updateUserAddress'])->name('address-update');

    Route::get('/address-delete/{id}', [UserController::class, 'deleteUserAddress'])->name('deleteaddress');
    Route::get('/address/{id}', [UserController::class, 'viewUserAddress'])->name('viewaddress');
     Route::get('/fetch-states', [UserController::class, 'fetchStatesForCountry'])->name('fetch-states');
});

 