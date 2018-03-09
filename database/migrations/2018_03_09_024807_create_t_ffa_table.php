<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFfaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('t_ffa', function (Blueprint $table) {
          $table->string('id', 10);
          $table->string('sample_id', 10);
          $table->enum('tangki', ['A','B','1']);
          $table->float('volume_titrasi',8,4);
          $table->float('bobot_sample',8,4);
          $table->float('normalitas',8,4);
          $table->float('faktor',8,4);
          $table->float('nilai',8,4);
          $table->timestamps();
          $table->primary('id');
          $table->foreign('sample_id')->references('id')->on('t_sample_minyak');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_ffa');
    }
}
