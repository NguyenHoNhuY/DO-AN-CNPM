<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\thanhtoan;
use App\Models\phong;
use App\Models\hoadondv;
use PhpParser\Node\Expr\FuncCall;

class thanhtoanController extends Controller
{
    public function thanhtoan($maphong){
        //tim phieu thue cua khach hang
        $phieuthue = DB::table('khachhangs')
                ->join('phieuthues','khachhangs.MaKH','phieuthues.MaKH')
                ->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
                ->select('khachhangs.MaKH','TenKH','NgayLap','TraTruoc','Gia','MaNV','phongs.MaPhong')
                ->where([['phongs.MaPhong',$maphong],['khachhangs.TinhTrang','Đang thuê']])->get();
        // tim cac dich vu khach hang yeu cau
        $hoadon =DB::table('phieuthues')
                ->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
                ->join('khachhangs','khachhangs.MaKH','phieuthues.MaKH')
                ->join('hoadondvs','hoadondvs.MaKH','khachhangs.MaKH')
                ->where([['phongs.MaPhong',$maphong],['khachhangs.TinhTrang','Đang thuê']])
                ->select('MaHDDV','TongTienDV','hoadondvs.NgayLap')
                ->orderByDesc('hoadondvs.NgayLap')
                ->get();
        if($hoadon->isEmpty()){ 
           return view('traphong',compact('phieuthue'));
         }else{
            $dichvu = DB::table('phieuthues')
            ->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
                ->join('khachhangs','khachhangs.MaKH','phieuthues.MaKH')
                ->join('hoadondvs','hoadondvs.MaKH','khachhangs.MaKH')
                ->join('chitietdvs','hoadondvs.MaHDDV','chitietdvs.MaHDDV')
                ->join('dichvus','dichvus.MaDV','chitietdvs.MaDV')
                ->where([['phongs.MaPhong',$maphong],['khachhangs.TinhTrang','Đang thuê']])
                ->select('chitietdvs.MaHDDV','dichvus.MaDV','TenDV','SoLuong','ThanhTien','dichvus.Gia')
                ->get();
            return view('traphong',compact('phieuthue','hoadon','dichvu')); 
         } 
         return $hoadon;
    }
    public function taomaTT($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function capnhatPhong($makh){
        DB::table('phieuthues')
        ->join('phongs','phieuthues.MaPhong','phongs.MaPhong')
        ->where('phieuthues.MaKH',$makh)
        ->update(['Tinhtrang' =>'open']);
    }
    public function capnhatKH($makh){
        DB::table('khachhangs')
        ->where('khachhangs.MaKH',$makh)
        ->update(['TinhTrang'=>'Hết thuê']);
    }
    public function themTT(Request $request){
        $thanhtoan = new thanhtoan();
        $matt = $this->taomaTT('thanhtoans','MaTT','TT',200);
        //cap nhat lai phong
        $this->capnhatPhong($request->makh);
        $this->capnhatKH($request->makh);
        $thanhtoan->MaTT = $matt;
        $thanhtoan->MaKH = $request->makh;
        $thanhtoan->MaNV = $request->manv;
        $thanhtoan->NgayLap = $request->ngaylap;
        $thanhtoan->TienPhong = $request->tienphong;
        $thanhtoan->TongTienTT = $request->tongtientt;
        $thanhtoan->save();
        return back()->with('alert_tt',"Thanh toán thành công");
    }
    public function inTT(){
        $data = DB::table('thanhtoans')->orderByDesc('NgayLap')->get();
        return view('layout/thanhtoan',compact('data'));
    }
    public function timkiemTT($manv){
        $data = DB::table('thanhtoans')->where('MaNV',$manv)->get();
        if(!$data->isEmpty()){
            return view('layout.thanhtoan',compact('data'));
        }else{
            return back()->with('fail_searchTT','Mã Nhân viên không tồn tại');
        } 
    }
    public function thongke(){
        return view('thongke');
    }
    public function doanhthuPhong(Request $request){ 
       $ngaybatdau = $request->tungay;
       $ngayketthuc =$request->denngay;
       $query = DB::select("SELECT NgayLap ,SUM(TienPhong) as TongTienPhong,SUM(TongTienTT) as TongTien 
                            FROM thanhtoans 
                            WHERE NgayLap >= '$ngaybatdau' && NgayLap <= '$ngayketthuc' 
                            GROUP BY day(NgayLap),NgayLap  
                            ORDER BY NgayLap ASC");
       return view('chart.barChart',compact('query'));  
    }
    public function doanhthuDV(Request $request){
       $ngaybatdau = $request->tungay;
       $ngayketthuc =$request->denngay;
       $query =DB::select("SELECT NgayLap ,SUM(TongTienDV)as TongTienDV FROM hoadondvs 
                           WHERE NgayLap >= '$ngaybatdau' && NgayLap <= '$ngayketthuc' 
                           GROUP BY day(NgayLap),NgayLap 
                           ORDER BY NgayLap ASC");
       return view('chart.lineChart',compact('query'));
    }
}
