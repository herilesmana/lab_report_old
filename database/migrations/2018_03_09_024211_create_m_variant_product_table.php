<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMVariantProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_variant_product', function (Blueprint $table) {
            $table->string('mid', 20);
            $table->string('name');
            $table->enum('status', ['Y', 'N']);
            $table->string('created_by', 12);
            $table->string('updated_by', 12);
            $table->timestamps();
            $table->primary('mid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_product');
    }
}
