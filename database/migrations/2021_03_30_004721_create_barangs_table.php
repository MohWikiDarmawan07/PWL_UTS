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
            $table->string('id_barang', 20)->primary();
            $table->string('kode_barang', 20)->nullable();
            $table->string('nama_barang', 50)->nullable();
            $table->string('kategori_barang', 20)->nullable();
            $table->string('harga', 20)->nullable();
            $table->string('qty', 20)->nullable();
            $table->timestamps();
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
