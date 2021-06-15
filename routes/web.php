<?php

use App\Http\Controllers\nhanvienController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dangnhap',[nhanvienController::class,'dangnhap'])->name('dangnhap');
Route::post('checkdangnhap',[nhanvienController::class,'checkdangnhap'])->name('kiemtra');
Route::get('them',[nhanvienController::class,'them'])->name('them');
Route::post('themnhanvien',[nhanvienController::class,'kiemtra'])->name('themnhanvien');
