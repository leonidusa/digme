<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', 'Auth\AuthController@getLogin');

Route::auth();
Route::get('dashboard', 'Admin\HomeController@index')->name('dashboard');
Route::resource('company', 'Admin\CompanyController');
Route::resource('employee', 'Admin\EmployeeController');
