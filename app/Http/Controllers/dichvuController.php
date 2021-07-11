<?php

namespace App\Http\Controllers;

use App\order;
use App\Models\dichvu;
use App\Models\hoadondv;
use App\Models\chitietdv;
use App\Models\khachhang;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class dichvuController extends Controller
{
    public function DVform(){

        return view('dichvu');
    }
    public function taomaDV($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function themDV(Request $request){
        $image =$request->file('hinhanh');
        $imageName =time().'.'. $image->getClientOriginalExtension();
        $image->move(('../resources/img/'),$imageName);
        $maDV = $this->taomaDV('dichvus','MaDV','DV','50');
        $dichvu = new dichvu();
        $dichvu->MaDV = $maDV;
        $dichvu->TenDV = $request->tendv;
        $dichvu->Gia = $request->gia;
        $dichvu->HinhAnh = $imageName;
        $dichvu->save();
        return back()->with('thanhcong_dv','Đã thêm mới dịch vụ'); 
    }
    public function orderDV(){
        $data= DB::table('dichvus')->orderBy('Gia')->get();
        return view('layout.dichvu',compact('data'));
    }
    public function xulyDV($maDV,Request $request){
        $dichvu = dichvu::where('MaDV',$maDV)->first();
        if($dichvu !=null){
            $oldOrder = Session('order') ? Session('order') :null;
            $newOrder = new order($oldOrder);
            $newOrder ->themDVmoi($maDV,$dichvu);
            $request->session()->put('order',$newOrder);
        }
        return view('gioDV');
    }
    public function xoaDVtrongYeucau($maDV,Request $request){
        $oldOrder = Session('order') ? Session('order') :null;
        $newOrder = new order($oldOrder);
        $newOrder ->xoaDV($maDV);
        if(count ($newOrder->cacdichvu) >0 ) {
            $request->Session()->put('order',$newOrder);  
        }
        else{
            $request->Session()->forget('order');
        }
        return view('gioDV');
    }
    public function thaydoisl($maDV,$soluong,Request $request){
        $oldOrder = Session('order') ? Session('order') :null;
        $newOrder = new order($oldOrder);
        $newOrder ->thaydoiDV($maDV,$soluong);
        $request->session()->put('order',$newOrder);
        return view('gioDV');
    }
    //tao ma HDDV
    public function taomaHDDV($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    //tao ma CTHDDV
    public function taomaCTDV($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function taoHDDV(Request $request){
        if($request->makh){
            $khachhang = khachhang::select('MaKH')->where('MaKH',$request->makh)->first();
            $hoadon = new hoadondv();
            $mahddv = $this->taomaHDDV('hoadondvs','MaHDDV','HDDV','100');
            $hoadon->MaHDDV = $mahddv;
            $hoadon->MaNV = 'NV01';
            $hoadon->NgayLap = date('Y-m-d');
            $hoadon->TongTienDV = $request->session()->get('order')->tongtien;
            $khachhang->hoadonDVs()->save($hoadon);
            ////danh sach id san pham trong gio hang
            $dichvuTrongOrder = $request->session()->get('order')->cacdichvu;
            $temp = hoadondv::select('MaHDDV')->where('MaHDDV',$mahddv)->first();
            foreach($dichvuTrongOrder as $dichvu=>$val){
                $madv=$val['thongtinDV']->MaDV;
                $soluong = $val['soluong'];
                $tien = $val['giatien'];
                $mactdv =$this->taomaCTDV('chitietdvs','MaCTDV','CTDV','100');
                $temp->dichvus()->attach($madv,[
                    'MaCTDV' => $mactdv,
                    'SoLuong' => $soluong,
                    'ThanhTien'  => $tien,
                    ]);  
            }
            $request->session()->forget('order');
            return back()->with('alert_hddv',"Yêu cầu dịch vụ thành công");
        }else{
            return back()->with('alert_hddv',"Yêu cầu nhập mã khách hàng");
        }
    }
}
