<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate')->unique()->index();
            $table->integer('vehecletype_id')->unsigned()->index();
            $table->foreign('vehecletype_id')->references('id')->on('vehecletypes')->onDelete('restrict');
            $table->string('chasisNumber')->nullable();
            $table->string('engineNumber')->nullable();
            $table->integer('tyreSyze')->nullable();
            $table->double('serviceIntervalKM',12,4)->nullable();
            $table->double('purchasePrice',12,4)->nullable();
            $table->date('productionDate')->nullable();
            $table->date('serviceStartDate')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}
