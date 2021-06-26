<?php

namespace App\Models;
use App\Models\dichvu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadondv extends Model
{
    use HasFactory;
    protected $table= 'hoadondvs';
    protected $fillable= ['MaHDDV','MaKH','MaNV','TongTienDV','NgayLap'];
    protected $primaryKey = 'MaHDDV';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
    public function khachhang(){
        return $this->belongsTo(khachhang::class,'MaKH');
    }
    public function dichvus(){ 
        return $this->belongsToMany(dichvu::class,'chitietdvs','MaHDDV','MaDV');
    }
}
