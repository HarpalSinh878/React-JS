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
        Schema::create('route', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->nullable();
            $table->enum('autocreation', ['On', 'Off'])->default('Off');
            $table->string('order_types')->nullable();
            $table->string('optimal_service_time_per_stop')->nullable()->comment('(seconds)');
            $table->string('optimal_orders_number_per_route')->nullable();
            $table->bigInteger('driver_id')->default(0);
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
        Schema::dropIfExists('route');
    }
};
