<?php 
namespace App;
class order{
    public $cacdichvu =[];
    public $tongsl = 0;
    public $tongtien = 0;
    public function __construct($order)
    {   
        if($order!=null){
            $this->cacdichvu = $order->cacdichvu;
            $this->tongsl = $order->tongsl;
            $this->tongtien = $order->tongtien;
        }
    }
    public function themDVmoi($madv,$dichvu){
        $dichvumoi = ['soluong' => 0 ,'giatien' => 0,'thongtinDV' => $dichvu];
        if($this->cacdichvu){
            if(array_key_exists($madv,$this->cacdichvu)){
                $dichvumoi = $this->cacdichvu[$madv];
            }
        }
        $dichvumoi['soluong']++;
        $dichvumoi['giatien'] = $dichvumoi['soluong'] * $dichvu->Gia;
        $this->cacdichvu[$madv] = $dichvumoi;
        $this->tongsl++;
        $this->tongtien += $dichvu->Gia;
    }
    public function xoaDV($madv){
        if($this->cacdichvu){
            if(array_key_exists($madv,$this->cacdichvu)){
                $this->tongsl -= $this->cacdichvu[$madv]['soluong'];
                $this->tongtien -= $this->cacdichvu[$madv]['giatien'];
                unset($this->cacdichvu[$madv]); 
            }
        }
    }
    public function thaydoiDV($madv,$soluong){
        if($this->cacdichvu){
            if(array_key_exists($madv,$this->cacdichvu)){
                $this->tongsl -= $this->cacdichvu[$madv]['soluong'];
                $this->tongtien -= $this->cacdichvu[$madv]['giatien'];

                $this->cacdichvu[$madv]['soluong'] = $soluong;
                $this->cacdichvu[$madv]['giatien'] = $soluong * $this->cacdichvu[$madv]['thongtinDV']->Gia;

                $this->tongsl += $this->cacdichvu[$madv]['soluong'];
                $this->tongtien += $this->cacdichvu[$madv]['giatien'];
            }
        }
    }
}

?>