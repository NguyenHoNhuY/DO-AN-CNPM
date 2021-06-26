<?php

namespace App\Http\Controllers;
use App\Models\phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class phongController extends Controller
{
    public function Phongform(){
        $data = DB::select('SELECT * FROM phongs ORDER BY tang ASC');
        return $data;
    }
    public function test(){
        $data = DB::select('SELECT * FROM phongs ORDER BY tang ASC');
        return $data;
    }
    public function taomaPhong($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function themPhong(Request $request){
        $maPhong = $this->taomaPhong('phongs','MaPhong','MP','50');
        $phong = new phong();
        $phong->MaPhong = $maPhong;
        $phong->LoaiPhong = $request->loaiphong;
        $phong->Gia = $request->gia;
        $phong->tang = $request->tang;
        $phong->Tinhtrang = "Trống";
        $phong->save();
        return back()->with('thanhcong_p','Đã thêm mới Phòng'); 
    }
    public function xoaPhong($id){
        phong::where('MaPhong',$id)->delete();
        return back()->with('xoaPhong','Phòng '.$id.' đã được xóa');
    }
     public function suaForm($id){
         $data =  phong::where('MaPhong',$id)->get();
        return view('suaPhong',compact('data'));
     }
     public function suaPhong(Request $request){
         phong::where('MaPhong' ,$request->maphong)
                ->update(['LoaiPhong' =>$request->loaiphong,
                          'Gia' => $request->gia,
                          'Tinhtrang'=> $request->tinhtrang]);         
         return back()->with('thanhcong_sp','Thông tin của phòng '.$request->maphong.' đã được chỉnh sửa');
     }
}
