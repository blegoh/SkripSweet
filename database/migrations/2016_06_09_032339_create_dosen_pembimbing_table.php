<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenPembimbingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dospem', function (Blueprint $table) {
            $table->char('mhs_nim',12);
            $table->string('dosen_nip');
            $table->enum('jenis',['pembimbing 1','pembimbing 2']);
            $table->foreign('mhs_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('dosen_nip')->references('nip')->on('pegawai')->onDelete('cascade');

            $table->primary(['mhs_nim', 'dosen_nip']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dospem');
    }
}
