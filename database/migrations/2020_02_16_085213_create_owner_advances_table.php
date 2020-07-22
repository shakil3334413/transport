<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_advances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->float('taka',20,2);
            $table->date('date');
            $table->text('choice');
            $table->float('total_taka',20,2);
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
        Schema::dropIfExists('owner_advances');
    }
}
