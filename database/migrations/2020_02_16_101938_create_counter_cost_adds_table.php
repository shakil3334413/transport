<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterCostAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_cost_adds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('counter_cost_id')->unsigned();
            $table->foreign('counter_cost_id')->references('id')->on('counter_cost_lists')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->float('taka',16,2);
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
        Schema::dropIfExists('counter_cost_adds');
    }
}
