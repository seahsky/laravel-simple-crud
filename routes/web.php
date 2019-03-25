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
    return view('welcome');
});
Route::get('/reset', function () {
    \Artisan::call('migrate:refresh',['--seed' => ' ']);
    return back();
})->name('reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminpage', 'HomeController@adminPage')->name('adminPage');

Route::resource('/company', 'CompanyController');
Route::resource('/employee', 'EmployeeController');
