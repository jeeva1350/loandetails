<?php

use Illuminate\Support\Facades\Route;

//Backend Routes
Route::get('admin', function () {
    return redirect('admin/login');
});
Route::get('login', function () {
    return redirect('admin/login');
});
Route::group(array('prefix' => 'admin'), function () { 
//login
//Route::get('login',function () { return view('auth/login'); });
Route::get('login','App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::get('register', function () {
    return redirect('admin/login');
});
Route::any('authenticate', array('uses' => 'App\Http\Controllers\Auth\LoginController@authenticate'))->name('authenticate');
Route::get('logout', array('uses' => 'App\Http\Controllers\Auth\LoginController@logout'))->name('logout');

// LOAN DETAILS

Route::get('loan-details','App\Http\Controllers\LoanDetailsController@index')->name('loan-details');
Route::get('loan-details/create','App\Http\Controllers\LoanDetailsController@create')->name('loan-details.create');
Route::get('loan-details/{id}','App\Http\Controllers\LoanDetailsController@show')->name('loan-details.show');
Route::Post('loan-details/store','App\Http\Controllers\LoanDetailsController@store')->name('loan-details.new');

// EMI DETAILS

Route::get('emi-details','App\Http\Controllers\LoanDetailsController@emi')->name('emi-details');
Route::get('emi-process','App\Http\Controllers\LoanDetailsController@emi_process')->name('emi-process');
Route::post('/emi/process', [LoanController::class, 'emi'])->name('emi.process');


// USer MAnagement
	//Users
	Route::resource('users', 'App\Http\Controllers\UsrController', [
		'names' => [
			'index' => 'users',
			'store' => 'users.new',
			'edit' => 'users.edit',
			'update' => 'users.update',

		],
	]);
	Route::any('user/changePassword', 'App\Http\Controllers\UsrController@changePassword')->name('changePassword');
	//Roles
	Route::resource('roles', 'App\Http\Controllers\RoleController', [
		'names' => [
			'index' => 'roles',
			'store' => 'roles.new',
			'edit' => 'roles.edit',
			'update' => 'roles.update',
		],
	]);

	


});








