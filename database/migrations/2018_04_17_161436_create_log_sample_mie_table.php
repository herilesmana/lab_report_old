<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogSampleMieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sample_mie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sample_id', 10);
            $table->string('nik', 12);
            $table->dateTime('log_time');
            $table->string('action', 20);
            $table->string('keterangan');
            $table->float('labu_isi_fc',8,4)->nullable();
            $table->float('labu_awal_fc',8,4)->nullable();
            $table->float('bobot_sample_fc',8,4)->nullable();
            $table->float('nilai_fc',8,4)->nullable();
            $table->float('w0_ka',8,4)->nullable();
            $table->float('w1_ka',8,4)->nullable();
            $table->float('w2_ka',8,4)->nullable();
            $table->float('nilai_ka',8,4)->nullable();
            $table->timestamps();
            $table->foreign('sample_id')->references('id')->on('t_sample_mie');
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
        Schema::dropIfExists('log_sample_mie');
    }
}
