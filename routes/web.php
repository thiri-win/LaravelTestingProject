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

// Route for Customer
Route::resource('/customers','CustomerController');
Route::get('/customers/{id}/readmore','CustomerController@readmore')->name('customers.readmore');

// Route for Listing
Route::get('/listing','ListingController@index')->name('listing.index');
Route::get('/listing/export/','ListingController@export')->name('listing.export');
Route::post('/listing/import/','ListingController@import')->name('listing.import');

//Route for Post
Route::resource('/posts','PostController');
Route::get('/posts/{user}/trashedposts', 'PostController@trashedposts')->name('posts.trashedposts');
Route::get('/posts/{post}/restore', 'PostController@restore')->name('posts.restore');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
