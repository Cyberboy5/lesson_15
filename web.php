<?php

USE App\Controllers\StudentController;
USE App\Routes\Route;

// Route::get('/',[StudentController::class,'index']);
Route::get('/',[StudentController::class,'product']);
Route::get('/category',[StudentController::class,'category']);
Route::post('/createProduct',[StudentController::class,'createProduct']);

?>