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
        Route::resource('articles', 'ArticlesController');
    }
);

Route::get('/', 'PageController@index')->name('home');

Route::get('/product', 'PageController@category_product')->name('category_product');
Route::get('/product/{name}i.{id}', 'PageController@detail_product')->name('detail_product');

Route::get('/news', 'PageController@category_news')->name('category_news');
Route::get('/news/{name}i.{id}', 'PageController@detail_news')->name('detail_news');

Route::get('/product/mostbuy', 'PageController@product_most_buyed')->name('product_most_buyed');
Route::get('/product/new', 'PageController@new_product')->name('new_product');

Route::get('/cart', 'PageController@cart')->name('cart');


?>