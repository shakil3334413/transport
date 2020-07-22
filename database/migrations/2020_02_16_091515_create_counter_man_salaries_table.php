<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterManSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_man_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counterman_id')->unsigned();
            $table->foreign('counterman_id')->references('id')->on('counter_man_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('shift')->nullable();
            $table->date('salary_date')->nullable();
            $table->float('taka',16,2);
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
        Schema::dropIfExists('counter_man_salaries');
    }
}
