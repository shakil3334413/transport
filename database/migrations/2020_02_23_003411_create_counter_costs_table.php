<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counter_id')->unsigned();
            $table->foreign('counter_id')->references('id')->on('counters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('counterman_salary_id')->unsigned()->nullable();
            $table->foreign('counterman_salary_id')->references('id')->on('counter_man_salaries')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('helper_salary_id')->unsigned()->nullable();
            $table->foreign('helper_salary_id')->references('id')->on('helper_salaries')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('checker_salaries_id')->unsigned()->nullable();
            $table->foreign('checker_salaries_id')->references('id')->on('checker_salaries')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('counter_cost_add_id')->unsigned()->nullable();
            $table->foreign('counter_cost_add_id')->references('id')->on('counter_cost_adds')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
           $table->integer('total_cost');
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
        Schema::dropIfExists('counter_costs');
    }
}
