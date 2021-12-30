<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('coin_id');
            $table->integer('user_id');
            $table->decimal('average_price', 20,10)->nullable();
            $table->decimal('quantity', 20, 10)->nullable();
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
        Schema::dropIfExists('coin_orders');
    }
}
