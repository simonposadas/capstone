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

// ADMIN ROUTES
    // login
    Route::get('/login', function(){
        return view('/admin/login');
    });
    Route::get('/doLogin', 'LoginController@doLogin')->name('admin.login');
    // end login

    // dashboard
    Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/admin', function () {
        return view('/admin/dashboard');
    });
    // end dashboard

    // food
    Route::get('/admin/food', 'Admin\AdminController@food');
    Route::get('/foods', function () {
        return view('/admin/food');
    });
    // end food

    // reservation
    Route::get('/admin/reservation', 'Admin\ReservationController@reservation');
    Route::get('/reservations', function () {
        return view('/admin/reservations');
    });
    // end reservation

    // packages
    Route::get('/admin/packages', 'Admin\AdminController@packages');
    Route::get('/packages', function () {
        return view('/admin/packages')->name('admin.packages');
    });
    // end packages


    // employee
    Route::get('/admin/employee', 'Admin\AdminController@employee');
    Route::get('/employee', function () {
        return view('/admin/employee');
    });
    // end employee
// END ADMIN ROUTES

// WEBSITE ROUTES

// END WEBSITE ROUTES
