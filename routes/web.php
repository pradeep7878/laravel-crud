<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ROUTE CONTROLLER===================
Route::post('/insert',[EmployeesController::class,'insert']);
Route::get('/fetch',[EmployeesController::class,'fetch']);
Route::get('/edit/{id}',[EmployeesController::class,'edit']);
Route::get('/delete/{id}',[EmployeesController::class,'delete']);
Route::post('/update',[EmployeesController::class,'update']);