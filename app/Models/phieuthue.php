<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieuthue extends Model
{
    use HasFactory;  
    protected $table= 'phieuthues';
    protected $fillable= ['MaPT','MaKH','MaPhong','MaNV','TraTruoc','GhiChu','NgayLap'];
    protected $primaryKey = 'MaPT';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';

}
