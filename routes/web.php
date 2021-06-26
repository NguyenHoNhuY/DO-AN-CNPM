<?php

use App\Http\Controllers\dichvuController;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\nhanvienController;
use App\Http\Controllers\phieuthueController;
use App\Http\Controllers\phongController;
use App\Models\phong;
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
//user
Route::get('dangnhap',[nhanvienController::class,'dangnhap'])->name('dangnhap');
Route::post('checkdangnhap',[nhanvienController::class,'checkdangnhap'])->name('kiemtra');
//NhanVien
Route::get('them',[nhanvienController::class,'them'])->name('them');
Route::post('themnhanvien',[nhanvienController::class,'kiemtra'])->name('themnhanvien');
//khachhang
Route::get('khachhang',[khachhangController::class,'KHform'])->name('KHform');
Route::post('themKH',[khachhangController::class,'themKH'])->name('themKH');
//phong
Route::get('phong',[phongController::class,'Phongform'])->name('Phongform');
Route::post('themPhong',[phongController::class,'themPhong'])->name('themPhong');
Route::get('suaPhong/{id}',[phongController::class,'Suaform'])->name('phong_SuaForm');
Route::post('kiemtraSua',[phongController::class,'suaPhong'])->name('suaPhong');
Route::get('xoaPhong/{id}',[phongController::class,'xoaPhong'])->name('xoaPhong');
//dichvu
Route::get('dichvu',[dichvuController::class,'DVform'])->name('DVform');
Route::post('themDV',[dichvuController::class,'themDV'])->name('themDV');
//
Route::get('phieuthue',[phieuthueController::class,'PTform'])->name('PTform');
Route::post('themPT',[phieuthueController::class,'themPT'])->name('themPT');