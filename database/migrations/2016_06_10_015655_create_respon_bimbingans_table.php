<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respon_bimbingan', function (Blueprint $table) {
            $table->increments('id');
            $table->text('respon');
            $table->unsignedInteger('bimbingan_id');
            $table->string('dosen_nip');
            $table->string('lampiran');
            $table->foreign('bimbingan_id')->references('id')->on('bimbingan')->onDelete('cascade');
            $table->foreign('dosen_nip')->references('nip')->on('pegawai')->onDelete('cascade');
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
        Schema::drop('respon_bimbingan');
    }
}
