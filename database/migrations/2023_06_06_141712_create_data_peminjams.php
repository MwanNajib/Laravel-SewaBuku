<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjam')->unique();
            $table->string('nama_peminjam');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('pekerjaan');
            // $table->string('foto');
            $table->bigInteger('id_jenis_kelamin')->unsigned();
            $table->timestamps();
        });

        Schema::table('data_peminjams', function (Blueprint $table) {
            $table->foreign('id_jenis_kelamin')->references('id')->on('jenis_kelamin')
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
        Schema::dropIfExists('data_peminjams');
    }
}