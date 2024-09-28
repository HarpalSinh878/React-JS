<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->string('route_name')->nullable();
            $table->string('route_name_id')->nullable();
            $table->string('route_name_i')->nullable();
            $table->json('path')->nullable();
            $table->polygon('area')->nullable();
            $table->text('regions_color')->nullable();
            $table->string('service_time')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->enum('sameday_delivery', ['Yes', 'No'])->default('No');
            $table->string('sameday_start_place')->nullable();
            $table->string('sameday_finish_place')->nullable();
            $table->enum('is_queued', ['Yes', 'No'])->default('No');
            $table->enum('is_real', ['Yes', 'No'])->default('No');
            $table->bigInteger('total_order')->default(0);
            $table->dateTime('started')->nullable();
            $table->string('hub_start_lat')->nullable();
            $table->string('hub_start_lng')->nullable();
            $table->string('hub_finish_lat')->nullable();
            $table->string('hub_finish_lng')->nullable();
            $table->enum('is_route_optimized', ['Yes', 'No'])->default('No');
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
        Schema::dropIfExists('regions');
    }
};
