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

Route::get('/', 'DashboardController@index');

/* Hotel CRUD route */
Route::resource('/hotels', 'HotelController');

/* Confirm delete */
Route::get('/hotels/{id}/confirmDelete', 'HotelController@confirmDelete');

/* Show create rooms details */
Route::get('/hotels/{hotel}/rooms_details/create', 'RoomsDetailController@create');

/* Create rooms details */
Route::post('/hotels/{hotel}/rooms_details', 'RoomsDetailController@store');

/* Show edit rooms details */
Route::get('/rooms_details/edit/{id}', 'RoomsDetailController@edit');

/* Edit rooms details */
Route::resource('/rooms_details', 'RoomsDetailController');
