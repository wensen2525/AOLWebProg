<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->longText('ingredients')->nullable();
            $table->longText('howtouse')->nullable();
            $table->longText('dose')->nullable();
            $table->longText('sideeffects')->nullable();
            $table->string('price');
            $table->string('image');
            $table->integer('stock')->default(100);
            $table->integer('stock_sold')->default(0);
            $table->boolean('is_open')->default(true);
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
};
