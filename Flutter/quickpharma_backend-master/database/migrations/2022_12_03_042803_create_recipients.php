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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->text('delivery_address')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('apt')->nullable();
            $table->string('phone')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->json('home_phone')->nullable();
            $table->json('other_email')->nullable();
            $table->bigInteger('added_by');
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
        Schema::dropIfExists('recipients');
    }
};
