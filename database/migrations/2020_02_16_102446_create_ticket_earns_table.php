<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketEarnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_earns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('total_ticket')->nullable();
            $table->float('per_ticket_price',16,2)->nullable();
            $table->float('total_amount',30,2)->nullable();
            $table->string('shift')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('ticket_earns');
    }
}
