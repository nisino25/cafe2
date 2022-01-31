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
Route::get('/','ContactsController@index');
Route::get('/index','ContactsController@index');

Route::get('/contact','ContactsController@contact');
Route::post('/contact','ContactsController@check');

// Route::get('/confirm','ContactsController@confirm');
Route::post('/confirm','ContactsController@create');

Route::post('/complete','ContactsController@create');

Route::get('/check', 'ContactsController@check');
Route::post('/check', 'ContactsController@display');

Route::get('/delete', 'ContactsController@delete');