<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('sell_price', 20, 15)->nullable();
            $table->decimal('sell_quantity', 10, 2)->nullable();
            $table->decimal('sell_money', 8, 2)->nullable();
            $table->integer('stl_profit')->nullable();
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
        Schema::dropIfExists('sell_orders');
    }
}
