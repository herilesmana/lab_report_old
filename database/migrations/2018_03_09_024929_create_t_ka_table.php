<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ka', function (Blueprint $table) {
          $table->string('id', 10);
          $table->string('sample_id', 10);
          $table->float('w0',8,4);
          $table->float('w1',8,4);
          $table->float('w2',8,4);
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
        Schema::dropIfExists('t_ka');
    }
}
