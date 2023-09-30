<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            
            $table->id();
            $table->integer('user_id');
            $table->integer('event_card_id');
            $table->integer('card_transaction_id');
            $table->integer('status');
            $table->integer('event_id');
            $table->float('total',8,2);
            $table->float('refund',8,2);
            $table->float('balance',8,2);
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
        Schema::dropIfExists('refunds');
    }
}
