<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhtoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoans', function (Blueprint $table) {
            $table->string('MaTT');
            $table->string('MaKH');
            $table->string('MaNV');
            $table->date('NgayLap');
            $table->integer('TienPhong');
            $table->integer('TongTienTT');
            $table->foreign('MaKH')->references('MaKH')->on('khachhangs');
            $table->foreign('MaNV')->references('MaNV')->on('nhanviens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoans');
    }
}
