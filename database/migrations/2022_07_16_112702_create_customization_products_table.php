<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizationProductsTable extends Migration
{

    public function up()
    {
        Schema::create('customization_products', function (Blueprint $table) {
            $table->id();
            // key feature
            $table->string('model');
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->string('description');

            $table->integer('clock_speed');
            $table->string('cache');
            $table->string('cores');
            $table->string('socket');

            // Specifications
            $table->integer('base_frequency');
            $table->integer('threads');
            $table->integer('default_TDP');

            $table->integer('maximum_size');
            $table->integer('maximum_speed');
            $table->string('type');
            $table->integer('maximum_number_channels');

            $table->string('processor_graphics');
            $table->integer('maximum_dynamic_frequency');

            $table->string('warranty');



            // relations
            $table->unsignedBigInteger('customization_category_id')->default();
            $table->foreign('customization_category_id')
                ->references('id')
                ->on('customization_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('customization_products');
    }
}
