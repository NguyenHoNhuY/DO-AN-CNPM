<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdvs', function (Blueprint $table) {
            $table->string('MaCTDV');
            $table->string('MaDV');
            $table->string('MaHDDV');
            $table->integer('SoLuong');
            $table->integer('ThanhTien');
            $table->foreign('MaDV')->references('MaDV')->on('dichvus');
            $table->foreign('MaHDDV')->references('MaHDDV')->on('hoadondvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdvs');
    }
}
