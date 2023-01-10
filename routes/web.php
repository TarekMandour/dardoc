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

Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/policy', 'HomeController@policy'); 
Route::get('record-pdf/{id}', 'HomeController@record_pdf')->name('record_pdf');
