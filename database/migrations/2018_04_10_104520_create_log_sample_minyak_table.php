<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogSampleMinyakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sample_minyak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sample_id', 10);
            $table->string('nik', 12);
            $table->dateTime('log_time');
            $table->string('action', 20);
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('sample_id')->references('id')->on('t_sample_minyak');
            $table->foreign('nik')->references('nik')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_sample_minyak');
    }
}
