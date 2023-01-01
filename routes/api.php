<?php

use App\Http\Controllers\HRController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function(){

    Route::middleware(['role:hr_manager'])->group(function(){
        
        Route::post('/hr',[HRController::class,'store'])->name('register');
        Route::get('/employee',[HRController::class,'index'])->name('list.employee');
        Route::get('/employee/{employee}',[HRController::class,'show'])->name('show.user');
        Route::put('/change-status/{employee}',[HRController::class,'changeStatus'])->name('status.update.employee');
        
    });

    Route::middleware(['role:employee'])->group(function(){
        
        Route::put('/contact',[EmployeeController::class,'updateContact'])->name('update.contact'); 
    
    });

    hello its me  

    Route::post('/logout',[UserController::class,'logout'])->name('logout');
    
});

Route::post('/login',[UserController::class,'logIn'])->name('login');


