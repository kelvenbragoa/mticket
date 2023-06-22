<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellDetailBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_detail_bars', function (Blueprint $table) {
            $table->id();
            $table->integer('sell_id');
            $table->integer('user_id');
            $table->integer('event_id');
            $table->integer('product_id');
            $table->integer('status');
            $table->integer('qtd');
            $table->float('price',8,2);
            $table->float('total',8,2);
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
        Schema::dropIfExists('sell_detail_bars');
    }
}
