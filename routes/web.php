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
Route::middleware('can:access-dashboard')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile/create', 'ProfileController@create')->name('profile.create');
});

// Handling Profile
Route::get('/profile/{profile}/show', 'ProfileController@show')->name('profile.show');
Route::post('/profile/{profile}/update', 'ProfileController@update')->name('profile.update');
Route::post('/profile/{profile}/store', 'ProfileController@store')->name('profile.store');

// Handling Post
Route::resource('post', 'PostController');
