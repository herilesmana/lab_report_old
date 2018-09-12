<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('codename', 50);
            $table->enum('jenis_sample', ['MYK', 'MIE']);
            $table->enum('status', ['Y', 'N']);
            $table->string('created_by', 12);
            $table->string('updated_by', 12);
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
        Schema::dropIfExists('auth_report');
    }
}
