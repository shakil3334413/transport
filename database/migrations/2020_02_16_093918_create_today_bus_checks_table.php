<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodayBusChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('today_bus_checks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cheacker_id')->unsigned();
            $table->foreign('cheacker_id')->references('id')->on('checker_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('checkpost_id')->unsigned();
            $table->foreign('checkpost_id')->references('id')->on('check_posts')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');       
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('check_date')->nullable();
            $table->time('check_time')->nullable();
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
        Schema::dropIfExists('today_bus_checks');
    }
}
