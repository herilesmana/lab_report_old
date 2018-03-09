<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_fc', function (Blueprint $table) {
            $table->string('id', 10);
            $table->string('sample_id', 10);
            $table->float('labu_isi',8,4);
            $table->float('labu_awal',8,4);
            $table->float('bobot_sample',8,4);
            $table->float('nilai',8,4);
            $table->timestamps();
            $table->primary('id');
            $table->foreign('sample_id')->references('id')->on('t_sample_mie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_fc');
    }
}
