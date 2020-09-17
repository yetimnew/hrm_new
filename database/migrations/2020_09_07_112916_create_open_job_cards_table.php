<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenJobCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_job_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_card_type_id')->index();
            $table->foreign('job_card_type_id')->references('id')->on('job_card_types')->onDelete('restrict');
            $table->string('Job_card_number')->uniqid();
            $table->dateTime('opening_date');
            $table->unsignedBigInteger('workshop_id')->index();
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('restrict');
            $table->unsignedInteger('truck_id')->index();
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('restrict');
            $table->unsignedBigInteger('customer_id')->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');

            $table->json('job_system_id');
            // $table->foreign('job_system_id')->references('id')->on('job_systems')->onDelete('restrict');
            $table->json('job_ident_id');
            // $table->foreign('job_ident_id')->references('id')->on('job_idents')->onDelete('restrict');

            $table->double('km_reading', 6, 2)->default(0.00);
            $table->dateTime('km_reading_date')->nullable();

            $table->bigInteger('driver_id')->nullable();
            $table->bigInteger('mechanic_id')->nullable();
            $table->bigInteger('ass_mechanic_id')->nullable();
            $table->bigInteger('opening_clerk_id')->nullable();
            $table->bigInteger('receptionist_id')->nullable();
            $table->boolean('closed')->default(0);
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
        Schema::dropIfExists('open_job_cards');
    }
}
