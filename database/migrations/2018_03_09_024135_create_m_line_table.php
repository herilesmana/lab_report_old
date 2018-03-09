<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_line', function (Blueprint $table) {
            $table->string('id', 3);
            $table->string('dept_id', 3);
            $table->enum('status', ['Y', 'N']);
            $table->string('created_by', 12);
            $table->string('updated_by', 12);
            $table->timestamps();
            $table->primary('id');
            $table->foreign('dept_id')->references('id')->on('m_department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_line');
    }
}
