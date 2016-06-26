<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanDosPemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_dospem', function (Blueprint $table) {
            $table->increments('id');
            $table->char('mhs_nim',12);
            $table->string('judul');
            $table->string('draft_proposal');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('mhs_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengajuan_dospem');
    }
}
