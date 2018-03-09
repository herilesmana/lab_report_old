<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_shift', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shift_name', 50);
            $table->date('date');
            $table->string('created_by', 12);
            $table->string('updated_by', 12);
            $table->timestamps();
            $table->foreign('shift_name')->references('name')->on('m_shift');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_shift');
    }
}
