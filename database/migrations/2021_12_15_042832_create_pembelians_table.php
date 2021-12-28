<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_suplier')->nullable();
            $table->unsignedBigInteger('id_karyawan')->nullable();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('karyawans');
            $table->foreign('id_suplier')->references('id')->on('supliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
