<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

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

//=====================================CategoryController====================================//
Route::get('/',[CategoryController::class,'category'])->name('category');
Route::get('/category-form',[CategoryController::class,'categform'])->name('category-form');
Route::post('/savecategory',[CategoryController::class,'savecategory'])->name('savecategory');
Route::get('/editcategory/{slug}',[CategoryController::class,'edit'])->name('editcateg');
Route::post('/updatecategory/{slug}',[CategoryController::class,'update']);
Route::get('/deletecategory/{slug}',[CategoryController::class,'delete'])->name('deletecateg');

//====================================SubcategoryController=====================================//
Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
Route::get('/subcategory/category-form',[SubcategoryController::class,'subcategform'])->name('subcategory-form');
Route::post('/subcategory/savesubcategory',[SubcategoryController::class,'savesubcategory'])->name('savesubcategory');
Route::get('/subcategory/editsubcategory/{slug}',[SubcategoryController::class,'edit'])->name('editsubcateg');
Route::post('/subcategory/updatesubcategory/{slug}',[SubcategoryController::class,'update']);
Route::get('/subcategory/deletesubcategory/{slug}',[SubcategoryController::class,'delete'])->name('deletesubcateg');





