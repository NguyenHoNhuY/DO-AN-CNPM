<?php

namespace App\Http\Controllers;
use App\Models\phieuthue;
use App\Models\phong;
use Illuminate\Http\Request;

class phieuthueController extends Controller
{
    public function PTform(){ 
        return view('phieuthue');
    }
    public function taomaPT($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function capnhatPhong($maphong){
        phong::where('MaPhong',$maphong)->update(['TinhTrang'=>'Đã Thuê']);
    }
    public function themPT(Request $request){
        $phieuthue = new phieuthue();
        $maPT = $this->taomaPT('phieuthues','MaPT','PT',1000);
        $this->capnhatPhong($request->maphong);
        $phieuthue->MaPT = $maPT;
        $phieuthue->MaKH = $request->makh;
        $phieuthue->MaPhong = $request->maphong;
        $phieuthue->MaNV = $request->manv;
        $phieuthue->TraTruoc = $request->tientt;
        $phieuthue->GhiChu =$request->ghichu;
        $phieuthue->NgayLap = $request->ngaylap;
        $phieuthue->save();
        return back()->with('thanhcong_pt','Đặt phòng thành công');
    }
   
}
