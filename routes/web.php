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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/","RegiController@Registrations");

Route::post("RegistrationsRequest","RegiController@RegistrationsRequest");

Route::get("editEmployee/{id}","RegiController@editEmployee");

Route::post("UpdateRequest","RegiController@UpdateRequest");

Route::get("deleteEmployee/{id}","RegiController@deleteEmployee");