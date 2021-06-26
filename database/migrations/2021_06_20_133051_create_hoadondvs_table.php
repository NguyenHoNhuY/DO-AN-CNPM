<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadondvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadondvs', function (Blueprint $table) {
            $table->string('MaHDDV');
            $table->string('MaKH');
            $table->string('MaNV');
            $table->integer('TongTienDV');
            $table->date('NgayLap');
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
        Schema::dropIfExists('hoadondvs');
    }
}
