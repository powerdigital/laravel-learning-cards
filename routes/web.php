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

// Welcome page route
Route::get('/', 'Frontend\CategoryController@index');


// Auth routes
Auth::routes();

// Hide expensive routes
Route::get('/register', function () {
    return redirect('/');
});
Route::post('/register', function () {
    return redirect('/');
});

Route::get('/password/reset', function () {
    return redirect('/');
});
Route::get('/password/reset/{token}', function () {
    return redirect('/');
});

Route::get('/password/request', function () {
    return redirect('/');
});

Route::post('/password/email', function () {
    return redirect('/');
});


// Admin dashboard
Route::get('admin', 'Admin\IndexController@index')->name('admin');

// Admin categories
Route::resource('admin/category', 'Admin\CategoryController');

// Admin cards
Route::resource('admin/card', 'Admin\CardController');

// Frontend categories
Route::get('category', 'Frontend\CategoryController@index');

// Frontend cards
Route::get('card/{categoryId}', 'Frontend\CardController@index');
