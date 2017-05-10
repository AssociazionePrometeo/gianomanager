<?php

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
    return response()->redirectToRoute('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::group(['namespace' => 'User', 'middleware' => 'auth'], function(){
  Route::get('/profile', 'ProfileController@edit')->name('profile');
  Route::put('/profile', 'ProfileController@update')->name('profile.update');
  Route::get('/cards', 'CardController@index')->name('cards.index');
  Route::put('/cards/{card}/lock', 'CardController@lock')->name('cards.lock');
  Route::put('/cards/{card}/unlock', 'CardController@unlock')->name('cards.unlock');
  Route::get('/reservations', 'ReservationController@index')->name('reservations.index');
  Route::get('/reservations/{reservation}/edit', 'ReservationController@edit')->name('reservations.edit');
  Route::put('/reservations/update', 'ReservationController@update')->name('reservations.update');
  Route::post('/reservations/store', 'ReservationController@store')->name('reservations.store');
  Route::get('/reservations/create', 'ReservationController@create')->name('reservations.create');
  Route::delete('/reservations/{reservation}/destroy', 'ReservationController@destroy')->name('reservations.destroy');


});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.resources.index');
    });

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('resources', 'ResourceController');
    Route::resource('reservations', 'ReservationController');
    Route::resource('cards', 'CardController');
});
