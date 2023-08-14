<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//jobs
Route::get('/jobs',[JobController::class,'showJobs'])->name('jobs.view');
Route::get('/jobs/create',[JobController::class,'addJob'])->name('jobs.make');
Route::put('/jobs/update/{id}',[JobController::class,'updateJob'])->name('jobs.update');
Route::get('/jobs/edit/{id}',[JobController::class,'editJob'])->name('jobs.customize');
Route::get('/jobs/show/{id}',[JobController::class,'showJob'])->name('jobs.detailed');
Route::post('/jobs/store',[JobController::class, 'storeJob'])->name('jobs.store');
//employees
Route::get('/employees',[JobController::class,'showAll'])->name('employees.view');
Route::get('/employees/create',[JobController::class,'addEmployee'])->name('employees.make');
Route::put('/employees/update/{id}',[JobController::class,'updateEmployee'])->name('employees.update');
Route::get('/employees/edit/{id}',[JobController::class,'editEmployee'])->name('employees.customize');
Route::get('/employees/show/{id}',[JobController::class,'showEmployee'])->name('employees.detailed');
Route::post('/employees/store',[JobController::class, 'storeEmployee'])->name('employees.store');

