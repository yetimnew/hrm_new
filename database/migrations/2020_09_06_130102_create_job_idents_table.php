<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobIdentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_idents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('job_system_id')->index();
            $table->foreign('job_system_id')->references('id')->on('job_systems')->onDelete('restrict');
            $table->double('mechanic_hours_mercedes', 6, 2)->default(0.00);
            $table->double('mechanic_hours_tracker', 6, 2)->default(0.00);
            $table->double('mechanic_hours_190e', 6, 2)->default(0.00);
            $table->double('mechanic_renault', 6, 2)->default(0.00);
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
        Schema::dropIfExists('job_idents');
    }
}
