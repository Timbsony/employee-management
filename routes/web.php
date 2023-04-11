<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyConfigsController;
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
Route::get('farmer-allocate/{id}',[App\Http\Controllers\FarmerController::class, 'getFarmerId'])->name('farmers.allocate');
Route::any('farmer-assign/{id}',[App\Http\Controllers\FarmerController::class, 'assignFarm'])->name('farmers.assign');

/****************************** Farms***************************************/
Route::resource('farms', FarmController::class);
Route::any('update/farm/{id}',[App\Http\Controllers\FarmController::class, 'update'])->name('farms.update');
Route::any('delete/farm/{id}',[App\Http\Controllers\FarmController::class, 'destroy'])->name('farms.destroy');

/****************************** Inventory***************************************/
Route::resource('inventories', InventoryController::class);
Route::any('update/inventory/{id}',[App\Http\Controllers\InventoryController::class, 'update'])->name('inventories.update');
Route::any('delete/inventory/{id}',[App\Http\Controllers\InventoryController::class, 'destroy'])->name('inventories.destroy');

/****************************** Requisition Input***************************************/
Route::resource('requisitionInputs', RequisitionInputController::class);
Route::any('update/requisition-input/{id}',[App\Http\Controllers\RequisitionInputController::class, 'update'])->name('requisitionInputs.update');
Route::any('delete/requisition-input/{id}',[App\Http\Controllers\RequisitionInputController::class, 'destroy'])->name('requisitionInputs.destroy');

/****************************** Requisition Cash***************************************/
Route::resource('requisitionCash', RequisitionCashController::class);
Route::any('update/requisition-cash/{id}',[App\Http\Controllers\RequisitionCashController::class, 'update'])->name('requisitionCash.update');
Route::any('delete/requisition-cash/{id}',[App\Http\Controllers\RequisitionCashController::class, 'destroy'])->name('requisitionCash.destroy');
