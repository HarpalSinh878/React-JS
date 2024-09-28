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
        Schema::create('route_autocreate_schedule_days', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('route_id')->unsigned();
            $table->string('days')->nullable();
            $table->string('hours')->nullable();
            $table->string('minute')->nullable();
            $table->foreign('route_id')->references('id')->on('route')->onDelete('cascade');
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
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('route_autocreate_schedule_days');
        Schema::enableForeignKeyConstraints();
    }
};
