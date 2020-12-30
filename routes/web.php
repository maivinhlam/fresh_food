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

Route::get('/', 'PageController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('admin.admin');
} )->name('logout');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'name' => 'user.',
], function () {
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController')->only(['index', 'show']);
});
Route::group([
    'name' => 'admin.',
    'prefix' => 'admin',
    'middleware' => 'auth'
    ], function () {
        Route::resource('users', 'UserController');
        Route::resource('products', 'ProductController');
        Route::resource('roles', 'RoleController');
        Route::resource('brands', 'BrandController');
        Route::resource('product_types', 'ProductTypeController');
        Route::resource('slides', 'SlideController');
    }
);
?>