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

// Guest and Unauthenticated User
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes(['reset' => false]);
Route::get('/home', 'HomeController@index')->name('home');

// Dashboard Access
Route::get('/dashboard', function()
{
    return view('dashboard');
})->middleware('can:access-dashboard')->name('dashboard');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');


