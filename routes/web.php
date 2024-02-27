<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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

//===================================BrandController========================================//
Route::get('/brand',[BrandController::class,'brand'])->name('brand');
Route::get('/brand/brand-form',[BrandController::class,'brandform'])->name('brandform');
Route::post('/brand/savebrand',[BrandController::class,'savebrand']);
Route::get('/brand/editbrand/{id}',[BrandController::class,'edit'])->name('editbrand');
Route::post('/brand/updatebrand/{id}',[BrandController::class,'update']);
Route::get('/brand/deletebrand/{id}',[BrandController::class,'delete'])->name('deletebrand');

//==================================SizeController========================================//
Route::get('/size',[SizeController::class,'size'])->name('size');
Route::get('/size/sizeform',[SizeController::class,'sizeform'])->name('sizeform');
Route::post("/size/savesize",[SizeController::class,'savesize']);
Route::get('/size/editsize/{id}',[SizeController::class,'edit'])->name('editsize');
Route::post('/size/updatesize/{id}',[SizeController::class,'update']);
Route::get('/size/deletesize/{id}',[SizeController::class,'delete'])->name('deletesize');

//=================================ColorController======================================//
Route::get('/color',[ColorController::class,'color'])->name('color');
Route::get('/color/colorform',[ColorController::class,'colorform'])->name('colorform');
Route::post('/color/savecolor',[ColorController::class,'savecolor']);
Route::get('/color/editcolor/{id}',[ColorController::class,'edit'])->name('editcolor');
Route::post('/color/updatecolor/{id}',[ColorController::class,'update']);
Route::get('/color/deletecolor/{id}',[ColorController::class,'delete'])->name('deletecolor');

//=================================ProductController===================================//
Route::get('/product',[ProductController::class,'product'])->name('product');
Route::get('/product/productform',[ProductController::class,'productform'])->name('productform');
Route::post('/product/saveproduct',[ProductController::class,'saveproduct']);



//===============================AjaxCall=========================================//
Route::get('/ajaxcall', [ProductController::class, 'ajaxCall'])->name('ajax-call');

