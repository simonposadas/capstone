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

Route::get('/login', function(){
    return view('admin.login');
});
Route::get('/doLogin', 'LoginController@doLogin')->name('admin.login');


Route::get('/dashboard', 'Admin\AdminController@dashboard');
Route::get('/admin', function () {
    return view('/admin/dashboard')->name('admin.dashboard');
});


Route::get('/admin/food', function () {
    return view('/admin/food');
});

Route::get('/admin/packages', function () {
    return view('/admin/packages');
});

Route::get('/admin/employee', function () {
    return view('/admin/employee');
});

Route::get('/admin/reservations', function () {
    return view('/admin/reservations');
});