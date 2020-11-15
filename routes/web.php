<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('password/change', 'ProfileController@showChangePasswordForm')->name('show.password');
    Route::post('password/change', 'ProfileController@changePassword')->name('update.password');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
