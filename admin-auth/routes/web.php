<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('Employees');

Route::post('/SaveEmployee', [App\Http\Controllers\EmployeesController::class, 'Create'])->name('SaveEmployee');

Route::get('/ListingEmployee', [App\Http\Controllers\EmployeesController::class, 'Read'])->name('ListingEmployee');

Route::PATCH('/Update/{id}', [App\Http\Controllers\EmployeesController::class, 'Update'])->name('UpdateEmployee');




Route::get('/Companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('Companies');

Route::post('/SaveCompany', [App\Http\Controllers\CompaniesController::class, 'Create'])->name('SaveCompany');

Route::get('/CompanyListing', [App\Http\Controllers\CompaniesController::class, 'Read'])->name('CompanyListing');

Route::PATCH('/Update/{id}', [App\Http\Controllers\CompaniesController::class, 'Update'])->name('CompanyUpdate');




Route::get('/Edit/{id}', [App\Http\Controllers\CompaniesController::class, 'Edit'])->name('CompanyEdit');

Route::DELETE('/Destroy/{id}', [App\Http\Controllers\CompaniesController::class, 'Destroy'])->name('RemoveCompany');

Route::get('/Edit/{id}', [App\Http\Controllers\EmployeesController::class,'Edit'])->name('employment');

Route::DELETE('/Destroy/{id}', [App\Http\Controllers\EmployeesController::class, 'Destroy'])->name('RemoveEmployee');