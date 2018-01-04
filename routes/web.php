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
    Route::get('/admin/food', 'Admin\FoodController@food');
    Route::get('/foods', function () {
        return view('/admin/food');
    });
    Route::get('/getFood', 'Admin\FoodController@getFood');
    Route::post('/addFood', 'Admin\FoodController@addFood');
    Route::post('/editFood', 'Admin\FoodController@editFood');
    Route::post('/deleteFood', 'Admin\FoodController@deleteFood');
    // end food

    // food type
    Route::get('/admin/foodtype', 'Admin\FoodTypeController@foodType');
    Route::get('/foodType', function () {
        return view('/admin/foodtype');
    });
    Route::get('/getFoodType', 'Admin\FoodTypeController@getFoodType');
    Route::post('/addFoodType', 'Admin\FoodTypeController@addFoodType');
    Route::post('/editFoodType', 'Admin\FoodTypeController@editFoodType');
    Route::post('/deleteFoodType', 'Admin\FoodTypeController@deleteFoodType');
    // end food type

    // reservation
    Route::get('/admin/reservation', 'Admin\ReservationController@reservation');
    Route::get('/reservations', function () {
        return view('/admin/reservations');
    });
    Route::get('/admin/reservation_create', function () {
        return view('/admin/reservation_create');
    });
    // end reservation

    // packages
    Route::get('/admin/packages', 'Admin\PackageController@packages');
    Route::get('/packages', function () {
        return view('/admin/packages');
    });
    Route::get('/getPack', 'Admin\PackageController@getPack');
    Route::post('/addPack', 'Admin\PackageController@addPack');
    Route::post('/editPack', 'Admin\PackageController@editPack');
    Route::post('/deletePack', 'Admin\PackageController@deletePack');
    // end packages


    // employee
    Route::get('/admin/employee', 'Admin\EmployeeController@employee');
    Route::get('/employee', function () {
        return view('/admin/employee');
    });
    Route::get('/getEmployee', 'Admin\EmployeeController@getEmployee');
    Route::post('/addEmployee', 'Admin\EmployeeController@addEmployee');
    Route::post('/editEmployee', 'Admin\EmployeeController@editEmployee');
    Route::post('/deleteEmployee', 'Admin\EmployeeController@deleteEmployee');
    // end employee

    // employee role
    Route::get('/admin/employeerole', 'Admin\EmployeeRoleController@employeeRole');
    Route::get('/employeerole', function () {
        return view('/admin/employeerole');
    });
    Route::get('/getEmployeeRole', 'Admin\EmployeeRoleController@getEmployeeRole');
    Route::post('/addEmployeeRole', 'Admin\EmployeeRoleController@addEmployeeRole');
    Route::post('/editEmployeeRole', 'Admin\EmployeeRoleController@editEmployeeRole');
    Route::post('/deleteEmployeeRole', 'Admin\EmployeeRoleController@deleteEmployeeRole');
    // end employee role
    
// END ADMIN ROUTES

// WEBSITE ROUTES

// END WEBSITE ROUTES