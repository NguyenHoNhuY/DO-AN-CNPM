<?php

namespace App\Http\Controllers;
use App\Models\phieuthue;
use App\Models\phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class phieuthueController extends Controller
{
    public function PTform(){ 
        return view('phieuthue');
    }
    public function taomaPT($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function capnhatPhong($maphong){
        phong::where('MaPhong',$maphong)->update(['TinhTrang'=>'full']);
    }
    public function themPT(Request $request){
        $phieuthue = new phieuthue();
        $maPT = $this->taomaPT('phieuthues','MaPT','PT',300);
        $this->capnhatPhong($request->maphong);
        $phieuthue->MaPT = $maPT;
        $phieuthue->MaKH = $request->makh;
        $phieuthue->MaPhong = $request->maphong;
        $phieuthue->MaNV = $request->manv;
        $phieuthue->TraTruoc = $request->tientt;
        $phieuthue->GhiChu =$request->ghichu;
        $phieuthue->NgayLap = $request->ngaylap;
        $phieuthue->save();
        // xoa sesion khachhang
        $request->session()->forget('khachhang');
        return back()->with('alert_pt','Đặt phòng thành công');
    }
    public function chitietPT($maphong){
        $query = DB::table('phieuthues')
                ->join('khachhangs','phieuthues.MaKH','khachhangs.MaKH')
                ->where([['MaPhong',$maphong],
                        ['khachhangs.TinhTrang','Đang thuê']])
                ->select('khachhangs.*','phieuthues.TraTruoc','phieuthues.GhiChu')
                ->get();
        return view('chitietPT',compact('query'));
    }
}
