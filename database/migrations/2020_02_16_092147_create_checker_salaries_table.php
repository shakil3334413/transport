<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckerSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checker_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checker_id')->unsigned();
            $table->foreign('checker_id')->references('id')->on('checker_infos')
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
        Schema::dropIfExists('checker_salaries');
    }
}
