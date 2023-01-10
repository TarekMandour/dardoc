<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Auth
Route::post('/login', 'Api\AuthController@login');
Route::post('/check_code', 'Api\AuthController@check_code');
Route::get('/get_profile/{id}', 'Api\AuthController@get_profile');
Route::get('/remove-notification/{id}', 'Api\AuthController@DeleteNotification');
Route::get('/fav-notification/{id}', 'Api\AuthController@favNotification');
Route::post('/change_password', 'Api\AuthController@change_pasword');
Route::post('/register', 'Api\AuthController@Register');
Route::post('/update-profile', 'Api\AuthController@UpdateProfile');

// Pages
Route::get('/about', 'Api\PagesController@AboutUs');
Route::get('/terms', 'Api\PagesController@TermsConditions');
Route::get('/policy', 'Api\PagesController@Policies');
Route::get('/club-list', 'Api\PagesController@clublist');
Route::get('/settings', 'Api\PagesController@Settings');
Route::get('/get-pdf', 'Api\PagesController@getPdf');
Route::post('/contact', 'Api\PagesController@Contact');

// Categories && Posts
Route::get('/categories', 'Api\ClientsController@category');
Route::get('/sub-categories/{id}', 'Api\ClientsController@SubCategory');
Route::get('/posts-category/{id}', 'Api\ClientsController@CategoryPostsById');
Route::get('/mposts-category/{id}/{month}', 'Api\ClientsController@CategoryPostsByMonth');
Route::get('/post-details/{id}', 'Api\ClientsController@PostDetails');
Route::get('/offers', 'Api\ClientsController@offers');
