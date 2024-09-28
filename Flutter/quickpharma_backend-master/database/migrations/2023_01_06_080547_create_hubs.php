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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('facility')->default('New York');
            $table->string('title');
            $table->longText('address');
            $table->longText('path')->nullable();
            $table->point('location')->nullable();
            $table->polygon('area')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0:Inactive 1:Active');
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
        Schema::dropIfExists('hub');
    }
};
