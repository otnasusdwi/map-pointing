<?php

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

Route::get('/', function () {
    return view('login');
});

// Route::get('admin-page', function() {
//     return 'Halaman untuk Admin';
// })->middleware('role:admin')->name('admin.page');
Route::middleware(['role:admin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');

        Route::get('/driver', 'Admin\DriverController@index')->name('admin.driver');
        Route::get('/driver/create', 'Admin\DriverController@create')->name('admin.driver.create');
        Route::post('/driver/store', 'Admin\DriverController@store')->name('admin.driver.store');
        Route::get('/driver/edit/{id_user}', 'Admin\DriverController@edit')->name('admin.driver.edit');
        Route::post('/driver/update', 'Admin\DriverController@update')->name('admin.driver.update');
        Route::get('/driver/destroy/{id_user}', 'Admin\DriverController@destroy')->name('admin.driver.destroy');
        
        Route::get('/lokasi', 'Admin\LokasiController@index')->name('admin.lokasi');
        Route::get('/lokasi/create', 'Admin\LokasiController@create')->name('admin.lokasi.create');
        Route::post('/lokasi/store', 'Admin\LokasiController@store')->name('admin.lokasi.store');
        Route::get('/lokasi/edit/{id_lokasi}', 'Admin\LokasiController@edit')->name('admin.lokasi.edit');
        Route::post('/lokasi/update', 'Admin\LokasiController@update')->name('admin.lokasi.update');
        Route::get('/lokasi/destroy/{id_lokasi}', 'Admin\LokasiController@destroy')->name('admin.lokasi.destroy');

        Route::get('/rute', 'Admin\RuteController@index')->name('admin.rute');
        Route::get('/rute/list/{id_user}', 'Admin\RuteController@list')->name('admin.rute.list');
        Route::get('/rute/create/{id_user}', 'Admin\RuteController@create')->name('admin.rute.create');
        Route::post('/rute/store/{id_user}', 'Admin\RuteController@store')->name('admin.rute.store');
        Route::get('/rute/edit/{id_rute}', 'Admin\RuteController@edit')->name('admin.rute.edit');
        Route::post('/rute/update/{id_rute}', 'Admin\RuteController@update')->name('admin.rute.update');
        Route::get('/rute/destroy/{id_rute}', 'Admin\RuteController@destroy')->name('admin.rute.destroy');

        Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
    });
});

Route::middleware(['role:user'])->group(function () {
    Route::prefix('driver')->group(function() {
        Route::get('/home', 'Driver\HomeController@index')->name('driver.home');

        Route::get('/rute', 'Driver\RuteController@index')->name('driver.rute');
        Route::get('/rute/list/{id_rute}', 'Driver\RuteController@list')->name('driver.rute.list');
        Route::get('/rute/create/{id_rute}', 'Driver\RuteController@create')->name('driver.rute.create');
        Route::post('/rute/store/', 'Driver\RuteController@store')->name('driver.rute.store');

        Route::get('/profile', 'Driver\ProfileController@index')->name('driver.profile');
    });
});

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/');
});

// Route::get('/{id_user}/rute', 'RuteController@index')->name('rute');
// Route::get('/{id_user}/rute/create', 'RuteController@create')->name('rute.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
