<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    use HasFactory;
    protected $table= 'thanhtoans';
    protected $fillable= ['MaTT','MaKH','MaNV','NgayLap','TienPhong','TongTienTT'];
    protected $primaryKey = 'MaTT';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
}
