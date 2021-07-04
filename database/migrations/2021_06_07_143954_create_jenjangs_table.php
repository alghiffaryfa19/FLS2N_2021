<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('kelas_minimal')->default(10);
            $table->string('jenjang');
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
        Schema::dropIfExists('jenjangs');
    }
}
