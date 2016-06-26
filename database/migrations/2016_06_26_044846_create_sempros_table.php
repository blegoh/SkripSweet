<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sempro', function (Blueprint $table) {
            $table->increments('id');
            $table->char('mhs_nim',12);
            $table->string('judul_id');
            $table->string('judul_en');
            $table->boolean('aproved_dospem1')->default(false);
            $table->boolean('aproved_dospem2')->default(false);
            $table->boolean('tanggal')->default(false);
            $table->string('tempat');
            $table->string('pembahas_nip')->nullable();
            $table->foreign('mhs_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('pembahas_nip')->references('nip')->on('pegawai')->onDelete('cascade');
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
        Schema::drop('sempros');
    }
}
