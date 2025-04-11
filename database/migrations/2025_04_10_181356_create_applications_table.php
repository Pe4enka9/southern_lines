<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('patronymic')->nullable();
            $table->string('phone_number');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('cargo_type_id');
            $table->date('delivery_date');
            $table->unsignedBigInteger('additional_service_id')->nullable();
            $table->timestamps();

            $table->foreign('from_id')->references('id')->on('cities');
            $table->foreign('to_id')->references('id')->on('cities');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('cargo_type_id')->references('id')->on('cargo_types');
            $table->foreign('additional_service_id')->references('id')->on('additional_services');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
