<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('kode')->unique();
            $table->string('nama_barang', 64);
            $table->string('unit', 64);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('qty_stok');
            $table->unsignedBigInteger('id_kategory')->nullable();
            $table->unsignedBigInteger('id_suplier')->nullable();
            $table->timestamps();

            $table->foreign('id_kategory')->references('id')->on('kategories');
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
        Schema::dropIfExists('barangs');
    }
}
