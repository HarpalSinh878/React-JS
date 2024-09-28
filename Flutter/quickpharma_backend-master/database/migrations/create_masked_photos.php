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
        Schema::create('masked_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('regions_id');
            $table->string('mask_photo');
            $table->integer('status')->comment('1=approved,2=pending');
            $table->bigInteger('driver_id')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masked_photos');
    }
};
