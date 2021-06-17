<?php

namespace App\Models;

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
}
