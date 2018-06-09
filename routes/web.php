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
    return redirect('/admin');
});

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::namespace('Admin')->group(function() {

       Route::middleware('auth')->group(function() {
           Route::view('/', "admin.dashboard", ['title1' => "Dashboard", 'title2' => "Dashboard"])->name('dashboard');
           Route::get('register', 'DashboardController@registerAdmin')->name('register');

           Route::get('profile', 'DashboardController@profile')->name('profile');
           Route::put('profile', 'DashboardController@updateProfile')->name('setting.update');

           Route::resource('users', "PeopleController", ['only' => ['index', 'destroy']]);
       });
    });
});

Route::get('/home', 'HomeController@index')->name('home');
