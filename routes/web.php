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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('home');

Route::middleware('check.admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
});

Auth::routes();

Route::group([
    'name' => 'user.',
], function () {
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController')->only(['index', 'show']);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    route::get('login', 'Admin\LoginController@showLoginForm')->name('login');
    route::post('login', 'Admin\LoginController@login')->name('postlogin');
    route::get('logout', 'Admin\LoginController@logout')->name('getlogout');
    route::post('logout', 'Admin\LoginController@logout')->name('logout');

    route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('register');
    route::post('register', 'Admin\RegisterController@register')->name('postregister');
});

Route::group([
    'name' => 'admin.',
    'prefix' => 'admin',
    'middleware' => 'check.admin'
    ], function () {
        Route::resource('users', 'UserController');
        Route::resource('admins', 'AdminController');
        Route::resource('products', 'ProductController');
        Route::resource('roles', 'RoleController');
        Route::resource('brands', 'BrandController');
        Route::resource('product_types', 'ProductTypeController');
        Route::resource('slides', 'SlideController');
    }
);
?>
