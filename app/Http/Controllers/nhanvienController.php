<?php

namespace App\Http\Controllers;

use App\Models\bophan;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Auth;
class nhanvienController extends Controller
{
    public function them(){
        $bophan = bophan::all();
        return view('themnhanvien',compact('bophan'));
    }
    public function kiemtra(Request $request){
        $bophan = bophan::where('MaBP', $request->mabp)->first();
        $nhanvien = new nhanvien();
        $nhanvien->manv = $request->manv;
        $nhanvien->password = password_hash($request->password,PASSWORD_BCRYPT);//ma hoa password;
        $nhanvien->TenNV = $request->tennv;
        $nhanvien->NgaySinh = $request->ngaysinh;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->SoDienThoai = $request->sodienthoai;
        $nhanvien->CMND = $request->cmnd;
        $nhanvien->chucvu = $request->chucvu;
        $nhanvien->luong = $request->luong;
        $bophan->nhanviens()->save($nhanvien);//them nhân viên vào database;
    }
    public function dangnhap(){
        return view('dangnhap');
    }
    public function checkdangnhap(Request $request){
        $taikhoan = $request->taikhoan;
        $matkhau = $request->matkhau;
        if(Auth::guard('nhanvien')->attempt(['manv'=>$taikhoan,'password' =>$matkhau])){
            dd('đăng nhập thành công');
        }else{
            dd('đăng nhâp thất bại');
        }
    }
}
