<?php

use App\Http\Controllers\dichvuController;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\nhanvienController;
use App\Http\Controllers\phieuthueController;
use App\Http\Controllers\phongController;
use App\Http\Controllers\thanhtoanController;
use App\Http\Controllers\mainController;
use App\Models\nhanvien;
use App\Models\phieuthue;
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
Route::get('dangnhap', [nhanvienController::class, 'dangnhap'])->name('dangnhap');
Route::post('checkdangnhap', [nhanvienController::class, 'checkdangnhap'])->name('kiemtra');
Route::get('dangxuat', [nhanvienController::class, 'dangxuat'])->name('dangxuat');
//NhanVien
Route::get('nhanvien', [nhanvienController::class,'nhanvien'])->name('nhanvien');
Route::get('nhanvien/{tennv}', [nhanvienController::class,'timkiemNV'])->name('timkiemNV');//tim kiem nv theo tennv
Route::post('themnhanvien', [nhanvienController::class, 'themNV'])->name('themnhanvien');
Route::post('xoanhanvien', [nhanvienController::class, 'xoaNV'])->name('xoanhanvien');
Route::get('suaNVform/{manv}',[nhanvienController::class,'suaNVform'])->name('suaNVform');
Route::post('suaNV',[nhanvienController::class,'suaNV'])->name('suaNV');
//khachhang
Route::get('khachhang', [khachhangController::class, 'danhsachKH'])->name('khachhang');
Route::get('khachhang/{cmnd}',[khachhangController::class,'timkiemKH'])->name('timkiemKH');// tim kiem kh theo cmnd
Route::post('themKH', [khachhangController::class, 'themKH'])->name('themKH');
//phong
Route::get('phong', [phongController::class, 'danhsachphong'])->name('dsPhong');
Route::post('themPhong', [phongController::class, 'themPhong'])->name('themPhong');
Route::get('suaPhong/{id}', [phongController::class, 'Suaform'])->name('phong_SuaForm');
Route::post('kiemtraSua', [phongController::class, 'suaPhong'])->name('suaPhong');
Route::get('xoaPhong/{id}', [phongController::class, 'xoaPhong'])->name('xoaPhong');
//dichvu
Route::get('dichvu', [dichvuController::class, 'DVform'])->name('DVform');
Route::post('themDV', [dichvuController::class, 'themDV'])->name('themDV');
Route::post('xoaDV',[dichvuController::class,'xoaDV'])->name('xoaDV');

Route::get('suaDVform/{madv}',[dichvuController::class,'suaDVform'])->name('suaDVform');
Route::post('suaDV',[dichvuController::class,'suaDV'])->name('suaDV');
Route::get('order', [dichvuController::class, 'orderDV'])->name('orderDV');
Route::get('xulyDV/{maDV}', [dichvuController::class, 'xulyDV'])->name('xulyDV');
Route::get('xoaDV/{maDV}', [dichvuController::class, 'xoaDVtrongyeucau'])->name('xoaDVtrongyeucau');
Route::get('thaydoisl/{maDV}/{soluong}', [dichvuController::class, 'thaydoisl'])->name('thaydoisl');
Route::post('taoHD', [dichvuController::class, 'taoHDDV'])->name('taoHDDV');
//Phieuthue
Route::get('phieuthue', [phieuthueController::class, 'PTform'])->name('PTform');
Route::post('themPT', [phieuthueController::class, 'themPT'])->name('themPT');
Route::get('chitietPT/{maphong}',[phieuthueController::class,'chitietPT'])->name('chitietPT');
//Thanh toan
Route::get('thanhtoan/{maphong}', [thanhtoanController::class, 'thanhtoan'])->name('thanhtoan');
Route::post('themTT', [thanhtoanController::class, 'themTT'])->name('themTT');
Route::get('thanhtoan',[thanhtoanController::class,'inTT'])->name('inTT');
Route::get('thanhtoan/nhanvien/{manv}',[thanhtoanController::class,'timkiemTT'])->name('timkiemTT');// tim kiem theo manv
//Thong ke
Route::get('thongke', [thanhtoanController::class, 'thongke'])->name('thongke');
Route::get('doanhthuPhong', [thanhtoanController::class, 'doanhthuPhong']);
Route::get('doanhthuDV', [thanhtoanController::class, 'doanhthuDV']);
