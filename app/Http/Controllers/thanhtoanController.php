<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\khachhang;
use App\Models\phieuthue;
use App\Models\hoadondv;
use App\Models\dichvu;
class thanhtoanController extends Controller
{
    public function thanhtoan($makh){
        //tim phieu thue cua khach hang
        $phieuthue = DB::table('khachhangs')->join('phieuthues','khachhangs.MaKH','phieuthues.MaKH')
                ->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
                ->select('khachhangs.MaKH','TenKH','NgayLap','TraTruoc','Gia','MaNV')
                ->where('khachhangs.MaKH',$makh)->get();
        // tim cac dich vu khach hang yeu cau
        $hoadon =DB::table('hoadondvs')->select('MaHDDV','TongTienDV','NgayLap')->where('MaKH',$makh)->orderByDesc('MaHDDV')->get();
        if($hoadon->isEmpty()){ 
           return view('thanhtoan',compact('phieuthue'));
         }else{
            $dichvu = DB::table('hoadondvs')->join('chitietdvs','hoadondvs.MaHDDV','chitietdvs.MaHDDV')
            ->join('dichvus','dichvus.MaDV','chitietdvs.MaDV')
            ->select('chitietdvs.MaHDDV','dichvus.MaDV','TenDV','SoLuong','ThanhTien','Gia')
            ->where('hoadondvs.MaKH',$makh)
            ->orderByDesc('chitietdvs.MaHDDV')->distinct()
            ->get();
            return view('thanhtoan',compact('phieuthue','hoadon','dichvu')); 
         }
    }
    public function themTT(Request $request){
        dd($request);
    }
}
