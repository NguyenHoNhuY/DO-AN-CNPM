<?php

namespace App\Http\Controllers;
use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class khachhangController extends Controller
{
    public function danhsachKH(){
        $query  = khachhang::all();
        return view('layout.khachhang',compact('query'));
    }
    public function taomaKH($bang,$cot,$tiento,$max){
       return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function themKH(Request $request){
        $khachhang = new khachhang();
        $maKH = $this->taomaKH('khachhangs','MaKH','KH',1000);
        $khachhang->MaKH = $maKH;
        $khachhang->TenKh = $request->tenkh;
        $khachhang->CMND = $request->cmnd;
        $khachhang->DiaChi = $request->diachi;
        $khachhang->Gioitinh = $request->gioitinh;
        $khachhang->SoDienThoai = $request->sodienthoai;
        $khachhang->TinhTrang = "Đang thuê";
        $khachhang->save();
        $request->session()->put('khachhang',[$maKH,$request->tenkh]);
        return back()->with('alert_kh','Đã thêm mới khách hàng'); 
    }
}
