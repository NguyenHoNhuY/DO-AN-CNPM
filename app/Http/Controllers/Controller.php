<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function taoKhoaChinh($bang,$cot,$tiento,$max){
        $temp = false;
        while($temp == false){
            $maKH =$tiento.mt_rand(1,$max);//tạo số ngẫu nhiên từ 1 đến max;
            $data = DB::table($bang)->select($cot)->where($cot,$maKH)->get();
            if($data->isEmpty()){
                $temp = true;
            }else{
                $temp = false;
            }
        }
        return $maKH;
    }
}
