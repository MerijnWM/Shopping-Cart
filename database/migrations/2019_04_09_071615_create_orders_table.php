<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('streetname');
            $table->string('housenumber');
            $table->string('postalcode');
            $table->enum('status', ['delivered', 'processing', 'cancelled']);
            $table->timestamps();                       
        });

        Schema::table('orders', function($table) {
            $table->foreign('user_id')->references('id')->on('users'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
