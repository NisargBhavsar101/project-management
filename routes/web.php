<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('employee',EmployeeController::class);
    Route::resource('task',TaskController::class);
});
Auth::routes(['verify'=> true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
