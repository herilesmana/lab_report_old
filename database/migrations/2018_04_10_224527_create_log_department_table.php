<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_department', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_id', 3);
            $table->string('nik', 12);
            $table->dateTime('log_time');
            $table->string('action', 20);
            $table->string('keterangan');
            $table->timestamps();
            $table->foreign('dept_id')->references('id')->on('m_department');
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
        Schema::dropIfExists('log_department');
    }
}
