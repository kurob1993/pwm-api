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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message/store', 'MessageController@store')->name('message.store');
Route::get('/message/show', 'MessageController@show')->name('message.show');
Route::get('/users', 'UserController@index')->name('users');
Route::put('/users/update/priority/{id}', 'UserController@updatePriority')->name('update.priority');
