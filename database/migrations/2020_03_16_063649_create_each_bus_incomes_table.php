<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEachBusIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('each_bus_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->float('trip_number',16,1);
            $table->float('all_trip',16,1);
            $table->float('all_bus_earn',30,1);
            $table->float('trip_rate',16,1);
            $table->float('earn',16,1);
            $table->float('oil_cost',16,1);
            $table->float('staff_cost',16,1);
            $table->float('neat_earn',16,1);
            $table->float('ogrim_taka',25,1);
            $table->float('total_earn',30,1);
            $table->float('uttolon_taka',16,1)->nullable();
            $table->float('obosisto_taka',40,1);
            $table->float('joripana',16,1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('each_bus_incomes');
    }
}
