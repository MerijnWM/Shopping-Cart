<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('order_id');
            $table->integer('amount');
            $table->timestamps();         
        });

        Schema::table('order_product', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
