<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    use HasFactory;
    protected $table= 'phongs';
    protected $fillable= ['LoaiPhong','Gia','Tinhtrang','tang'];
    protected $primaryKey = 'MaPhong';
    public $increment =false;
    public $timestamps =false;
    protected $keyType = 'string';
}
