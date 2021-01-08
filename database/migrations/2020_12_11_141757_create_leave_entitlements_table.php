<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveEntitlementsTable extends Migration
{

    public function up()
    {
        Schema::create('leave_entitlements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personale_id')->index();
            $table->foreign('personale_id')->references('id')->on('personales')->onDelete('cascade');
            $table->double('no_of_days', 4,2);
            $table->double('days_used', 4,2)->nullable();
            $table->unsignedBigInteger('leave_type_id')->index();
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');

            $table->unsignedBigInteger('leave_period_id')->index();
            $table->foreign('leave_period_id')->references('id')->on('leave_periods')->onDelete('cascade');

            $table->text('note')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('leave_entitlements');
    }
}
