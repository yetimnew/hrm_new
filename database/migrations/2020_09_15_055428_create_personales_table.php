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
            $table->string('birthdate');
            $table->string('hireddate')->nullable();
            $table->boolean('driver')->default(0);

            $table->string('zone')->nullable();
            $table->string('woreda')->nullable();
            $table->string('city')->nullable();
            $table->string('sub_city')->nullable();
            $table->string('kebele')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('mobile')->nullable();
            $table->string('home_telephone')->nullable();
            $table->string('work_telephone')->nullable();
            $table->string('email')->nullable();

            $table->unsignedBigInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->unsignedBigInteger('jobtitle_id')->index();
            $table->foreign('jobtitle_id')->references('id')->on('jobtitles')->onDelete('cascade');

            $table->unsignedBigInteger('pay_grade_id')->index();
            $table->foreign('pay_grade_id')->references('id')->on('pay_grades')->onDelete('cascade');
            $table->unsignedBigInteger('pay_grade_level_id')->index();
            $table->foreign('pay_grade_level_id')->references('id')->on('pay_grade_levels')->onDelete('cascade');

            $table->boolean('employment_status')->default(1);
            $table->boolean('marital_status')->default(0);
            $table->text('image')->default(0);
            $table->boolean('status')->default(0);
            $table->text('comment')->nullable();
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
