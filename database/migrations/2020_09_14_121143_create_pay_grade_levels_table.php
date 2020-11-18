<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayGradeLevelsTable extends Migration
{

    public function up()
    {
        Schema::create('pay_grade_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pay_grade_id')->index();
            $table->foreign('pay_grade_id')->references('id')->on('pay_grades')->onDelete('cascade');
            $table->string('name');
            $table->text('comment')->nullable();
            $table->integer('salary');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('pay_grade_levels');
    }
}
