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

Route::get('/', function () {
    return view('front_end.home');
})->name('home');

Route::get('/admin', function () {
    return view('admin.admin');
} )->name('admin');

Route::get('/logout', function () {
    Auth::logout();
    return view('admin.admin');
} )->name('logout');
// Route::prefix('admin')->group(function () {
//     Route::resource('users', 'UserController');
//     Route::resource('products', 'ProductController');
// })->middleware('auth');

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
});
?>
