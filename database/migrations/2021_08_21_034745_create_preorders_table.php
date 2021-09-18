<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preorders', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_barang');
            $table->string('alamat');
            $table->string('telp');
            $table->date('tanggal_pemesanan');
            $table->integer('jumlah');
            $table->double('harga');
            $table->string('deksripsi');    
            $table->double('total')->nullable();
            $table->double('jumlah_bayar');
            $table->double('sisa')->nullable();
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
        Schema::dropIfExists('preorders');
    }
}
