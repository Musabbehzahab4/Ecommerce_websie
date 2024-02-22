<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
Route::get('/',[CategoryController::class,'category'])->name('category');
Route::get('/category-form',[CategoryController::class,'categform'])->name('category-form');
Route::post('/savecategory',[CategoryController::class,'savecategory'])->name('savecategory');
Route::get('/editcategory/{slug}',[CategoryController::class,'edit'])->name('editcateg');
Route::post('/updatecategory/{slug}',[CategoryController::class,'update']);
Route::get('/deletecategory/{slug}',[CategoryController::class,'delete'])->name('deletecateg');
