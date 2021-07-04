<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('kip')->nullable();
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kelas');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nohp');
            $table->string('ukuran_baju');
            $table->string('jalan');
            $table->string('no_rmh');
            $table->string('rt_rw');
            $table->integer('kodepos');
            $table->string('kelurahan');
            $table->char('district_id', 7);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('tim_id');
            $table->foreign('tim_id')->references('id')->on('tims')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('foto');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('anggotas');
    }
}
