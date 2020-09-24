<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personale_id')->index();
            $table->foreign('personale_id')->references('id')->on('personales')->onDelete('restrict');
            $table->string('name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('mobile')->nullable();
            $table->string('home_telephone')->nullable();
            $table->string('work_telephone')->nullable();
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
        Schema::dropIfExists('employees_emergency_contacts');
    }
}
