<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuthuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuthues', function (Blueprint $table) {
            $table->string('MaPT');
            $table->string('MaKH');
            $table->string('MaPhong');
            $table->string('MaNV');
            $table->integer('TraTruoc');
            $table->string('GhiChu');
            $table->date('NgayLap');
            $table->foreign('MaKH')->references('MaKH')->on('khachhangs');
            $table->foreign('MaPhong')->references('MaPhong')->on('phongs');
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
        Schema::dropIfExists('phieuthues');
    }
}
