<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->integer('npsn');
            $table->string('telp_sekolah');
            $table->string('status')->default('NEGERI');
            $table->string('kelurahan');
            $table->char('district_id', 7);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('jalan');
            $table->string('no_rmh');
            $table->string('rt_rw');
            $table->integer('tahun_masuk');
            $table->string('status_kelulusan');
            $table->integer('kodepos');
            $table->integer('kelas');
            $table->tinyInteger('simpan')->default(0);
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
        Schema::dropIfExists('sekolahs');
    }
}
