<?php

namespace App\Http\Controllers;

use App\Models\bophan;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class nhanvienController extends Controller
{
    public function nhanvien(){
        $query = DB::table('nhanviens')
                ->join('bophans','nhanviens.id_MaBP','bophans.MaBP')
                ->select('nhanviens.*','TenBP')
                ->get();
        $bophan = bophan::all();
        return view('layout.nhanvien',compact('query','bophan'));
    }
    public function timkiemNV($manv){
        $bophan = bophan::all();
        $query = DB::table('nhanviens')
            ->join('bophans','nhanviens.id_MaBP','bophans.MaBP')
            ->select('nhanviens.*','TenBP')
            ->where('MaNV',$manv)
            ->get();
        if(!$query->isEmpty()){
            return view('layout.nhanvien',compact('query','bophan'));
        }else{
            return back()->with('fail_searchNV','Mã khách hàng không tồn tại');
        }
    }
    public function themNV(Request $request){
        $bophan = bophan::where('MaBP', $request->mabp)->first();
        $nhanvien = new nhanvien();
        $nhanvien->manv = $request->manv;
        //ma hoa password;
        $nhanvien->password = password_hash($request->password,PASSWORD_BCRYPT);
        $nhanvien->TenNV = $request->tennv;
        $nhanvien->NgaySinh = $request->ngaysinh;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->SoDienThoai = $request->sodienthoai;
        $nhanvien->CMND = $request->cmnd;
        $nhanvien->chucvu = $request->chucvu;
        $nhanvien->luong = $request->luong;
        $bophan->nhanviens()->save($nhanvien);
        return back()->with('alert_tnv',"Đã thêm mới nhân viên");
    }
    public function xoaNV(Request $request){
        $nhanvien = nhanvien::find($request->manv);
        if($nhanvien !== null){
            nhanvien::where('MaNV',$request->manv)->delete();
            return back()->with('alert_xnv','Đã xóa nhân viên '.$request->manv);
        }else{
            return back()->with('fail_xnv','Mã nhân viên không tồn tại');
        }
    }
    public function suaNVform($manv){
        $nhanvien = nhanvien::findOrFail($manv);
        $bophan = bophan::all();
        return view('suaNV',compact('nhanvien','bophan'));
    }
    public function suaNV(Request $request){
        $bophan = bophan::where('MaBP', $request->mabp)->first();
        $nhanvien = nhanvien::find($request->manv);
        $nhanvien->TenNV = $request->tennv;
        $nhanvien->password = password_hash($request->password,PASSWORD_BCRYPT);
        $nhanvien->NgaySinh = $request->ngaysinh;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->SoDienThoai = $request->sdt;
        $nhanvien->CMND = $request->cmnd;
        $nhanvien->chucvu = $request->chucvu;
        $nhanvien->luong = $request->luong;
        $bophan->nhanviens()->save($nhanvien);
        return back()->with('alert_snv',"Đã sửa thông tin nhân viên ".$request->manv);
    }
    public function dangnhap(){
        return view('layout.login');
    }
    public function checkdangnhap(Request $request){
        $taikhoan = $request->taikhoan;
        $matkhau = $request->matkhau;
        if(Auth::guard('nhanvien')->attempt(['manv'=>$taikhoan,'password' =>$matkhau])){
            $nhanvien = DB::table('nhanviens')
                        ->where('manv',$taikhoan)
                        ->select('manv','TenNV','chucvu')
                        ->get();
            $request->session()->put('nhanvien',$nhanvien);
            return back()->with('alert_dn','Đăng nhập thành công');
        }else{
            return back()->with('alert_dn','Đăng nhập thất bại');
        }
    }
    public function dangxuat(Request $request){
        $request->session()->flush();
        return redirect('http://localhost/CNPM/public/dangnhap');
    }
}
