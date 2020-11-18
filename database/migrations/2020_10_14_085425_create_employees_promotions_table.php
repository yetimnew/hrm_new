<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personale_id')->index();
            $table->foreign('personale_id')->references('id')->on('personales')->onDelete('restrict');
            $table->unsignedBigInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->unsignedBigInteger('jobtitle_id')->index();
            $table->foreign('jobtitle_id')->references('id')->on('jobtitles')->onDelete('cascade');

            $table->unsignedBigInteger('pay_grade_id')->index();
            $table->foreign('pay_grade_id')->references('id')->on('pay_grades')->onDelete('cascade');
            $table->unsignedBigInteger('pay_grade_level_id')->index();
            $table->foreign('pay_grade_level_id')->references('id')->on('pay_grade_levels')->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('employees_promotions');
    }
}
