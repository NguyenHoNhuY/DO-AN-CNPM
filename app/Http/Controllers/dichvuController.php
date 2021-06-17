<?php

namespace App\Http\Controllers;
use App\Models\dichvu;
use Illuminate\Http\Request;

class dichvuController extends Controller
{
    public function DVform(){
        return view('dichvu');
    }
    public function taomaDV($bang,$cot,$tiento,$max){
        return parent::taoKhoaChinh($bang,$cot,$tiento,$max);
    }
    public function themDV(Request $request){
        $maDV = $this->taomaDV('dichvus','MaDV','DV','50');
        $dichvu = new dichvu();
        $dichvu->MaDV = $maDV;
        $dichvu->TenDV = $request->tendv;
        $dichvu->Gia = $request->gia;
        $dichvu->save();
        return back()->with('thanhcong_dv','Đã thêm mới dịch vụ'); 
    }
    
}
