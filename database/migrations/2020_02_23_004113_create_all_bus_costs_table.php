<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllBusCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_bus_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('gp_cost_add_id')->unsigned()->nullable();
            $table->foreign('gp_cost_add_id')->references('id')->on('gp_cost_adds')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('driver_salarie_id')->unsigned()->nullable();
            $table->foreign('driver_salarie_id')->references('id')->on('driver_salaries')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('cost_add_id')->unsigned()->nullable();
            $table->foreign('cost_add_id')->references('id')->on('cost_adds')
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
        Schema::dropIfExists('all_bus_costs');
    }
}
