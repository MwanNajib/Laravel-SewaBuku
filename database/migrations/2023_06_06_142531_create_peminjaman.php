<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->bigInteger('id_peminjam')->unsigned();
            $table->bigInteger('id_buku')->unsigned();
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->timestamps();
        });

        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_peminjam')->references('id')->on('data_peminjams')
            ->onDelete('cascade')->onUpdate('cascade');
          });
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_buku')->references('id')->on('data_buku')
            ->onDelete('cascade')->onUpdate('cascade');
          });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}