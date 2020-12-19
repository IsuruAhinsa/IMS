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
    Route::get('assets/{asset_id}/restore', 'AssetController@restore')->name('assets.restore');
    Route::get('assets/{asset_id}/fdelete', 'AssetController@fdelete')->name('assets.fdelete');

    /*
     *  Accessories
     */
    Route::resource('accessories', 'AccessoryController');
    Route::get('accessories/{accessory_id}/restore', 'AccessoryController@restore')->name('accessories.restore');
    Route::get('accessories/{accessory_id}/fdelete', 'AccessoryController@fdelete')->name('accessories.fdelete');

    /*
     *  Hospitals
     */
    Route::resource('hospitals', 'HospitalController');
    Route::get('hospitals/{hospital_id}/restore', 'HospitalController@restore')->name('hospitals.restore');
    Route::get('hospitals/{hospital_id}/fdelete', 'HospitalController@fdelete')->name('hospitals.fdelete');

    /*
     *  Locations
     */
    Route::resource('locations', 'LocationController');
    Route::get('locations/{location_id}/restore', 'LocationController@restore')->name('locations.restore');
    Route::get('locations/{location_id}/fdelete', 'LocationController@fdelete')->name('locations.fdelete');

    /*
     *  Categories
     */
    Route::resource('categories', 'CategoryController');
    Route::get('categories/{category_id}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::get('categories/{category_id}/fdelete', 'CategoryController@fdelete')->name('categories.fdelete');

    /*
     *  Manufacturers
     */
    Route::resource('manufacturers', 'ManufacturerController');
    Route::get('manufacturers/{manufacturer_id}/restore', 'ManufacturerController@restore')->name('manufacturers.restore');
    Route::get('manufacturers/{manufacturer_id}/fdelete', 'ManufacturerController@fdelete')->name('manufacturers.fdelete');

    /*
     *  Departments
     */
    Route::resource('departments', 'DepartmentController');
    Route::get('departments/{department_id}/restore', 'DepartmentController@restore')->name('departments.restore');
    Route::get('departments/{department_id}/fdelete', 'DepartmentController@fdelete')->name('departments.fdelete');

    /*
     *  Vendors
     */
    Route::resource('vendors', 'VendorController');
    Route::get('vendors/{vendor_id}/restore', 'VendorController@restore')->name('vendors.restore');
    Route::get('vendors/{vendor_id}/fdelete', 'VendorController@fdelete')->name('vendors.fdelete');

    /*
    *  Constructors
    */
    Route::resource('contractors', 'ContractorController');
    Route::get('contractors/{contractor_id}/restore', 'ContractorController@restore')->name('contractors.restore');
    Route::get('contractors/{contractor_id}/fdelete', 'ContractorController@fdelete')->name('contractors.fdelete');

    /*
    *  Spare Parts
    */
    Route::resource('spare-parts', 'SparePartController');
    Route::get('spare-parts/{spare_part_id}/restore', 'SparePartController@restore')->name('spare-parts.restore');
    Route::get('spare-parts/{spare_part_id}/fdelete', 'SparePartController@fdelete')->name('spare-parts.fdelete');

    /*
     *  Users
     */
    Route::resource('users', 'UserController');
    Route::get('users/{id}/fdelete', 'UserController@fdelete')->name('users.fdelete');
    Route::get('users/{id}/restore', 'UserController@restore')->name('users.restore');

    /*
     *  Roles
     */
    Route::resource('roles', 'RoleController')->except(['show']);

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
