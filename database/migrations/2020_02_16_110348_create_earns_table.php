<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('ticket_id')->unsigned()->nullable();
            $table->foreign('ticket_id')->references('id')->on('ticket_earns')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('access_id')->unsigned()->nullable();
            $table->foreign('access_id')->references('id')->on('accessories_earns')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
           $table->float('total_earn',40,2);
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
        Schema::dropIfExists('earns');
    }
}
