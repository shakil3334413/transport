<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodayDriverHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('today_driver_helpers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('driver_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('helper_id')->unsigned();
            $table->foreign('helper_id')->references('id')->on('helper_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('today_driver_helpers');
    }
}
