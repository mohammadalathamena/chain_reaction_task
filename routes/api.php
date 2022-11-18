<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
        
        Route::get('/{id}',[UserController::class,'show']);
        Route::get('/list',[UserController::class,'list']);
        Route::post('/change-status',[UserController::class,'list']);
        Route::post('/register',[UserController::class,'store']);
        
    });

    Route::middleware(['role:employee'])->group(function(){
        
        Route::post('/update-contact',[UserController::class,'updateContact']);
    
    });

    Route::post('/logout',[UserController::class,'logout']);
    
});

Route::post('/login',[UserController::class,'logIn']);


