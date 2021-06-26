<?php

namespace App\Models;
use App\Models\hoadondv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dichvu extends Model
{
    use HasFactory;
    protected $table= 'dichvus';
    protected $fillable= ['TenDV','Gia'];
    protected $primaryKey = 'MaDV';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
    public function hoadonDVs(){ 
        return $this->belongsToMany(hoadondv::class,'chitietdvs','MaDV','MaHDDV');
    }
}
