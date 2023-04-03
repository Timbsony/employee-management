<?php

use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CompanyConfigsController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaveTypesController;
use App\Http\Controllers\TaxDeductionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDeductionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserManagement;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('registerUser');

Route::get('/users/index', [UserManagement::class, 'index'])->name('users.index');
Route::get('/users-change-status/{id}', [UserManagement::class, 'changeStatus'])->name('users.change.status');
Route::get('/users-change-role/{id}', [UserManagement::class, 'changeRole'])->name('users.change.role');



/****************************** Farmers ***************************************/
Route::resource('farmers', FarmerController::class);
Route::any('update/farmer/{id}',[App\Http\Controllers\FarmerController::class, 'update'])->name('farmers.update');
Route::any('delete/farmer/{id}',[App\Http\Controllers\FarmerController::class, 'destroy'])->name('farmers.destroy');

/****************************** Farms***************************************/
Route::resource('farms', FarmController::class);
Route::any('update/farm/{id}',[App\Http\Controllers\FarmController::class, 'update'])->name('farms.update');
Route::any('delete/farm/{id}',[App\Http\Controllers\FarmController::class, 'destroy'])->name('farms.destroy');

/****************************** Inventory***************************************/
Route::resource('inventories', InventoryController::class);
Route::any('update/inventory/{id}',[App\Http\Controllers\InventoryController::class, 'update'])->name('inventories.update');
Route::any('delete/inventory/{id}',[App\Http\Controllers\InventoryController::class, 'destroy'])->name('inventories.destroy');
