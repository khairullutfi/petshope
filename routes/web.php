<?php

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


Route::get('/', 'HomeController@index')->name('home');


Route::get('adobsi', 'AdobsiController@index')->name('adobsi');

Route::group(['middleware' => 'auth'], function() {
    Route::get('chat', 'ChatController@index')->name('chat');
});

Route::prefix('user')
    ->group(function(){
      Route::resource('transaksi', 'TransaksiController');
      Route::resource('transaksidoctor', 'TransaksiDoctorController');
    });
  



Route::get('/detail-doctor/{slug}', 'DetailDoctorController@index')
      ->name('detail-doctor');

Route::get('/detail/{slug}', 'DetailController@index')
      ->name('detail');




Route::post('/checkout/{id}', 'CheckoutController@process')
      ->name('checkout_process')
      ->middleware(['auth','verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
      ->name('checkout')
      ->middleware(['auth','verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
      ->name('checkout-create')
      ->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
      ->name('checkout-remove')
      ->middleware(['auth','verified']);


Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
      ->name('checkout-success')
      ->middleware(['auth','verified']);





Route::post('/checkout_doctor/{id}', 'CheckoutDoctorController@process')
      ->name('checkout-process-doctor')
      ->middleware(['auth','verified']);

Route::get('/checkout_doctor/{id}', 'CheckoutDoctorController@index')
      ->name('checkout_doctor')
      ->middleware(['auth','verified']);

Route::post('/checkout_doctor/create/{detail_id}', 'CheckoutDoctorController@create')
      ->name('checkout-create-doctor')
      ->middleware(['auth','verified']);

Route::get('/checkout_doctor/remove/{detail_id}', 'CheckoutDoctorController@remove')
      ->name('checkout-remove-doctor')
      ->middleware(['auth','verified']);


Route::get('/checkout_doctor/confirm/{id}', 'CheckoutDoctorController@success')
      ->name('checkout-success-doctor')
      ->middleware(['auth','verified']);


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
       Route::get('/', 'DashboardController@index')
       ->name('dashboard'); 

       Route::resource('groming-package', 'GromingPackageController');
       Route::resource('gallery', 'GalleryController');
       Route::resource('transaction', 'TransactionController');
       Route::resource('doctor-package', 'DoctorPackageController');
       Route::resource('gallery-doctor', 'GalleryDoctorController');
       Route::resource('transaction-doctor', 'TransactionDoctorController');
       Route::resource('adobsi', 'AdobsiController');

    });

Auth::routes(['verify' => true]);


