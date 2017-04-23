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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.resources.index');
    });

    Route::resource('users', 'UserController');
    Route::resource('resources', 'ResourceController');
    Route::resource('reservations', 'ReservationController');
    Route::resource('cards', 'CardController');
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
      return redirect()->route('user.profile.index');
    });

    Route::resource('profile', 'ProfileController');
    });
