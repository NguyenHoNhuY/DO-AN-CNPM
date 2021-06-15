<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanviens', function (Blueprint $table) {
            $table->string('manv');
            $table->string('password');
            $table->string('id_MaBP');
            $table->string('TenNV');
            $table->date('Ngaysinh');
            $table->string('gioitinh');
            $table->string('diachi');
            $table->string('SoDienThoai');
            $table->string('CMND');
            $table->string('chucvu');
            $table->integer('Luong');
            $table->foreign('id_MaBP')->references('MaBP')->on('bophans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanviens');
    }
}
