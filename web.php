<?php

USE App\Controllers\StudentController;
USE App\Routes\Route;

// Route::get('/',[StudentController::class,'index']);
Route::get('/',[StudentController::class,'product']);
Route::get('/category',[StudentController::class,'category']);

Route::post('/create',[StudentController::class,'create']);
Route::get('/createProduct',[StudentController::class,'createProduct']);
Route::post('/deleteProduct',[StudentController::class,'deleteProduct']);
Route::post('/editProductPage',[StudentController::class,'editProductPage']);
Route::post('/editProduct',[StudentController::class,'editProduct']);



?>