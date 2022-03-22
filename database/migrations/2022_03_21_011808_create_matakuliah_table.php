<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('ta_id');
            $table->char('kode_matkul');
            $table->char('nama_matkul');
            $table->char('sks');
            $table->string('kategori');
            $table->char('smt');
            $table->timestamps();
            $table->foreign('prodi_id')->unsigned()->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('ta_id')->unsigned()->references('id')->on('tahunakademik')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}
