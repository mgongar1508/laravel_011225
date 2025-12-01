<?php

use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('roles', RoleController::class)->except('show');
Route::resource('departament', DepartamentController::class)->except('show');
Route::resource('employees', EmployeeController::class)->except('show');