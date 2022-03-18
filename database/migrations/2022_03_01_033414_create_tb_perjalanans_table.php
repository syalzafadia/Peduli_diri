<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPerjalanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_perjalanans', function (Blueprint $table) {
            $table->bigIncrements('id_perjalanan');
            $table->string('user_id');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('lokasi');
            $table->string('suhu_tubuh');
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
        Schema::dropIfExists('tb_perjalanans');
    }
}
