<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->id();
            $table->string('driverid')->unique()->index();
            $table->string('firstname');
            $table->string('fathername');
            $table->string('gfathername');
            $table->boolean('sex')->default(0);
            $table->date('birthdate');
            $table->string('zone')->nullable();
            $table->string('woreda')->nullable();
            $table->string('kebele')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('mobile')->nullable();
            $table->date('hireddate')->nullable();
            $table->boolean('driver')->default(0);
            $table->unsignedBigInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');
            $table->unsignedBigInteger('position_id')->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('restrict');
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('personales');
    }
}
