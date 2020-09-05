<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('origin_id')->index();
            $table->foreign('origin_id')->references('id')->on('places')->onDelete('restrict');
            $table->string('origin_name');
            $table->unsignedBigInteger('destination_id')->index();
            $table->string('destination_name');
            $table->foreign('destination_id')->references('id')->on('places')->onDelete('restrict');
            $table->bigInteger('km');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('distances');
    }
}
