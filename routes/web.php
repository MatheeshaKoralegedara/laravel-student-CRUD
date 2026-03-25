<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students',[StudentController::class,'index']);
Route::get('/students/create',[StudentController::class,'create']);
Route::post('/students/store',[StudentController::class,'store']);
Route::get('/students/delete/{id}',[StudentController::class,'delete']);
Route::get('/students/edit/{id}',[StudentController::class,'edit']);
Route::put('/students/update/{id}',[StudentController::class,'update']);