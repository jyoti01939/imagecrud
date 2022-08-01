<?php

use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[SchoolController::class,'index'])->name('school.index');
Route::get('create',[SchoolController::class,'create'])->name('school.create');
Route::post('store',[SchoolController::class,'store'])->name('school.store');
Route::get('edit/{id}',[SchoolController::class,'edit'])->name('school.edit');
Route::post('update/{id}',[SchoolController::class,'update'])->name('school.update');
Route::get('delete/{id}',[SchoolController::class,'destroy'])->name('school.delete');

