<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('mon')->default(0);
            $table->integer('tue')->default(0);
            $table->integer('wed')->default(0);
            $table->integer('thu')->default(0);
            $table->integer('fri')->default(0);
            $table->integer('sat')->default(0);
            $table->integer('sun')->default(0);
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
        Schema::dropIfExists('work_weeks');
    }
}
