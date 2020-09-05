<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverTruckTable extends Migration
{
    /**
     * Run the migrations.
    *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_truck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('restrict');

            $table->unsignedInteger('truck_id');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('restrict');
           
            $table->string('driverid');
            $table->foreign('driverid')->references('driverid')->on('drivers')->onDelete('restrict');
            $table->string('plate');
            $table->foreign('plate')->references('plate')->on('trucks') ->onDelete('restrict');
            $table->date('date_recived');
            $table->date('date_detach')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_attached')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_truck');
    }
}
