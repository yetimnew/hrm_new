<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personale_id')->index();
            $table->foreign('personale_id')->references('id')->on('personales')->onDelete('restrict');
            $table->string('employer')->nullable();
            $table->string('job_title')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('comment')->nullable();

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
        Schema::dropIfExists('work_experiances');
    }
}
