<?php

namespace App\Models;
use App\Models\hoadondv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table= 'khachhangs';
    protected $fillable= ['MaKH','TenKH','Diachi','CMND','Gioitinh','SoDienThoai'];
    protected $primaryKey = 'MaKH';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
    public function hoadonDVs(){
        return $this->hasMany(hoadondv::class,"MaKH");
    }
  
}
