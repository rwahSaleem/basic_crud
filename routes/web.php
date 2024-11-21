<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\categoryController;

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

Route::get('/',function(){
    return view('dashboardindex');
});
Route::group(['prefix'=>'/user','as'=>'user.'],function(){
    Route::get('/index',[UserController::class,'index'])->name('index');
    Route::get('/create',[UserController::class,'create'])->name('create');
    Route::post('/store/{id?}',[UserController::class,'store'])->name('store');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::get('/trash',[UserController::class,'trashed'])->name('trash');
    Route::get('/restore/{id}',[UserController::class,'restore'])->name('restore');
    Route::get('/destory/{id}',[UserController::class,'destroy'])->name('destory');
});


Route::group(['prefix'=>'/category','as'=>'category.'],function(){
    Route::get('/index',[categoryController::class,'index'])->name('index');
    Route::get('/create',[categoryController::class,'create'])->name('create');
    Route::post('/store/{id?}',[categoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[categoryController::class,'edit'])->name('edit');
    Route::get('/delete/{id}',[categoryController::class,'delete'])->name('delete');
    Route::get('/trash',[categoryController::class,'trashed'])->name('trash');
    Route::get('/restore/{id}',[categoryController::class,'restore'])->name('restore');
    Route::get('/destory/{id}',[categoryController::class,'destory'])->name('destory');
});


