<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//all api routes are wrapped in the api prefix group
//so the urls are prepended with /api...e.g www.kogwo.com/public/api/users, www.kogwo.com/public/api/users/login

Route::namespace('Admin')->group(function() {
    //send a post request to users to store
    Route::post('users', "PeopleController@store");
    //send a post request to verify users details for login
    Route::post('users/login', "PeopleController@login");
    //send a put request to update user record
    Route::put('users', "PeopleController@update");
    //send a delete request to delete user
    Route::delete('users/{id}', "PeopleController@delete");
});
