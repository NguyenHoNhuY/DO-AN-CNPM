<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bophan extends Model
{
    use HasFactory;
    protected $table= 'bophans';
    protected $fillable= ['MaBP','TenBP','Mota'];
    protected $primaryKey = 'MaBP';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
    public function nhanviens(){ 
        return $this->hasMany(nhanvien::class,'id_MaBP');
    }
}
