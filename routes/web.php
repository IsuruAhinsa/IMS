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

    Route::get('/', 'IndexController@index')
        ->name('index');

    Route::get('profile', 'ProfileController@index')
        ->name('profile');

    Route::post('profile/update', 'ProfileController@update')
        ->name('profile.update');

    Route::get('password/change', 'ProfileController@showChangePasswordForm')
        ->name('show.password');

    Route::post('password/change', 'ProfileController@changePassword')
        ->name('update.password');

    /*
     *  Assets
     */
    Route::resource('assets', 'AssetController');
    /*
     *  Hospitals
     */
    Route::resource('hospitals', 'HospitalController');
    /*
     *  Users
     */
    Route::resource('users', 'UserController');

    /* Settings */
    Route::get('settings', 'SettingController@settings')->name('settings.index');

    /* General Settings */
    Route::post('settings', 'SettingController@updateSettings')->name('settings.general.update');

    /* Branding Settings */
    Route::post('branding', 'SettingController@updateBranding')->name('settings.branding.update');

    /* Security Settings */
    Route::post('security', 'SettingController@updateSecurity')->name('settings.security.update');

    /* Localization Settings */
    Route::post('localization', 'SettingController@updateLocalization')->name('settings.localization.update');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
