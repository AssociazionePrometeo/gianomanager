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

Route::get('register/verify/{email}/{token}', 'Auth\RegisterController@verify')->name('email_verify');

Route::group(['namespace' => 'User', 'middleware' => 'auth'], function(){
  Route::get('/profile', 'ProfileController@edit')->name('profile');
  Route::put('/profile', 'ProfileController@update')->name('profile.update');
  Route::get('/cards', 'CardController@index')->name('cards.index');
  Route::put('/cards/{card}/lock', 'CardController@lock')->name('cards.lock');
  Route::put('/cards/{card}/unlock', 'CardController@unlock')->name('cards.unlock');
  Route::resource('reservations', 'ReservationController', ['only' => ['index', 'create', 'store', 'destroy',]]);
  Route::get('/reservations/archive', 'ReservationController@archive')->name('reservations.archive');
  Route::resource('subscriptions', 'SubscriptionController', ['only' => ['index', 'create', 'store', 'destroy',]]);
  Route::get('/subscriptions/archive', 'SubscriprionController@archive')->name('subscriptions.archive');


  });

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.resources.index');
    });

    Route::resource('users', 'UserController');
    Route::post('/users/{user}/validate', 'UserController@validateUser')->name('users.validate');
    Route::resource('roles', 'RoleController');
    Route::resource('resources', 'ResourceController');
    Route::resource('subscriptions', 'SubscriptionController');
    Route::resource('reservations', 'ReservationController');
    Route::resource('cards', 'CardController');
});
