<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesDependantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_dependants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personale_id')->index();
            $table->foreign('personale_id')->references('id')->on('personales')->onDelete('restrict');
            $table->string('name')->nullable();
            $table->string('relationship')->nullable();
            $table->boolean('relationship_type')->default(0);
            $table->date('date_of_birth')->nullable();

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
        Schema::dropIfExists('employees_dependants');
    }
}
