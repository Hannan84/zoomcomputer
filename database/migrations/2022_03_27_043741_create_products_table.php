<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('product_name');
            $table->integer('regular_price');
            $table->string('product_image');
            $table->double('product_offer');
            $table->text('product_description');

            // specifications
            $table->string('processor');
            $table->string('display');
            $table->string('memory');
            $table->string('storage');
            $table->string('graphics');
            $table->string('operating_system');
            $table->string('battery');
            $table->string('adapter');
            $table->string('audio');
            // input device
            $table->string('keyboard');
            $table->string('optical_drive');
            $table->string('webcam');
            // Network and wireless connectivity
            $table->string('wifi');
            $table->string('bluetooth');
            // Port connector and slot
            $table->string('USB');
            $table->string('HDMI');
            $table->string('VGA');
            $table->string('audio_jack_combo');
            // Physical specification
            $table->string('dimensions');
            $table->string('weight');
            $table->string('colors');
            $table->string('videoLink')->nullable();
            // warranty
            $table->string('manufacturing_warranty');

            $table->unsignedBigInteger('category_id')->default();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('products');
    }
}
