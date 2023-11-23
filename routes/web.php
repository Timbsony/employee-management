<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyConfigsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RequisitionCashController;
use App\Http\Controllers\RequisitionInputController;
use App\Http\Controllers\UserManagement;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('registerUser');


/****************************** Employees ***************************************/
Route::resource('employees', EmployeeController::class);
Route::any('update/employee/{id}',[App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
Route::any('delete/employee/{id}',[App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('download-pdf', [App\Http\Controllers\EmployeeController::class, 'downloadPDF'])->name('employees.pdf');

