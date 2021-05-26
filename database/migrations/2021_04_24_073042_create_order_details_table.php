<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            // $table->unsignedBigInteger('promotion_id');
            // $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->integer('quantity');
            $table->unsignedBigInteger('price_id');
            // $table->foreign('price_id')->references('id')->on('prices');
            // ALTER TABLE order_details
            // ADD CONSTRAINT price_id
            // FOREIGN KEY (price_id) REFERENCES prices(id);
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
