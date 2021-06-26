<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdv extends Model
{
    use HasFactory;
    protected $table= 'chitietdvs';
    protected $fillable= ['MaCTDV','MaDV','MaHDDV','SoLuong','ThanhTien'];
    protected $primaryKey = 'MaCTDV';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
}
