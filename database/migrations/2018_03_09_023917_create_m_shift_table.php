<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('m_shift', function (Blueprint $table) {
          $table->string('name', 50);
          $table->time('jam_awal');
          $table->time('jam_akhir');
          $table->string('created_by', 12);
          $table->string('updated_by', 12);
          $table->timestamps();
          $table->primary('name');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_shift');
    }
}
