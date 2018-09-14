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
//so the urls are prefixed with /api...e.g www.kogwo.com/public/api/users, www.kogwo.com/public/api/users/login

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

Route::post("capital/get", "CapitalController@index");      //send user_id to get capital for a user
Route::post("capital", "CapitalController@store");          //send user_id and amount to store capital for a user
Route::put("capital", "CapitalController@update");          //send capital_id and amount to update capital for a user
Route::delete("capital", "CapitalController@delete");       //send capital_id to delete capital

Route::post("expense/get", "ExpensesController@index");      //send user_id to get expenses for a user
Route::post("expense", "ExpensesController@store");          //send user_id, item and amount to store expenses for a user
Route::put("expense", "ExpensesController@update");          //send expense_id, item and amount to update expenses for a user
Route::delete("expense", "ExpensesController@delete");       //send expense_id to delete expenses

Route::post("sales/get", "SalesController@index");      //send user_id to get sales for a user
Route::post("sales", "SalesController@store");          //send user_id, item and amount to store sales for a user
Route::put("sales", "SalesController@update");          //send sale_id, item and amount to update sale for a user
Route::delete("sales", "SalesController@delete");       //send sale_id to delete sale

Route::post("notes/get", "NotesController@index");      //send user_id to get notes for a user
Route::post("notes", "NotesController@store");          //send user_id and note to store note for a user
Route::put("notes", "NotesController@update");          //send note_id and note to update note for a user
Route::delete("notes", "NotesController@delete");       //send note_id to delete note

Route::post("report", "ReportController@generate");     //send user_id,month,year to generate monthly report for a user
