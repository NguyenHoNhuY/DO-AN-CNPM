<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\thanhtoan;
use App\Models\phong;
use App\Models\hoadondv;
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
    public function taomaTT($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function capnhatPhong($makh){
        DB::table('phieuthues')->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
        ->where('phieuthues.MaKH',$makh)
        ->update(['Tinhtrang' =>'open']);
    }
    public function themTT(Request $request){
        $thanhtoan = new thanhtoan();
        $matt = $this->taomaTT('thanhtoans','MaTT','TT',50);
        //cap nhat lai phong
        $this->capnhatPhong($request->makh);
        $thanhtoan->MaTT = $matt;
        $thanhtoan->MaKH = $request->makh;
        $thanhtoan->MaNV = $request->manv;
        $thanhtoan->NgayLap = $request->ngaylap;
        $thanhtoan->TienPhong = $request->tienphong;
        $thanhtoan->TongTienTT = $request->tongtientt;
        $thanhtoan->save();
        ///thanh toan thanh cong
    }
    public function thongke(){
        return view('thongke');
    }
    public function doanhthuPhong(Request $request){ 
       $ngaybatdau = $request->tungay;
       $ngayketthuc =$request->denngay;
       $query = DB::select("SELECT NgayLap ,SUM(TienPhong)as TongTienPhong,SUM(TongTienTT) as TongTien FROM thanhtoans WHERE NgayLap >= '$ngaybatdau' && NgayLap <= '$ngayketthuc' GROUP BY day(NgayLap),NgayLap DESC");
       return view('chart.barChart',compact('query'));  
    }
    public function doanhthuDV(Request $request){
       $ngaybatdau = $request->tungay;
       $ngayketthuc =$request->denngay;
       $query =DB::select("SELECT NgayLap ,SUM(TongTienDV)as TongTienDV FROM hoadondvs WHERE NgayLap >= '$ngaybatdau' && NgayLap <= '$ngayketthuc' GROUP BY day(NgayLap),NgayLap DESC");
       return view('chart.lineChart',compact('query'));
    }
}
