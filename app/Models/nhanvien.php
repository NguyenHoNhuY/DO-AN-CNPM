<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nhanvien extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['manv','password','TenNV','NgaySinh','gioitinh','diachi','SoDienThoai','CMND','chucvu','Luong'];
    protected $table = 'nhanviens';
    protected $primaryKey = 'manv';
    public $increment = false;
    public $timestamps = false;
    protected $keyType = 'string';
    public function bophan(){
        return $this->belongsTo(bophan::class,'id_MaBP');
    }
}
