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
        Schema::table('regions', function (Blueprint $table) {
            $table->enum('is_finished', ['Yes', 'No'])->default('No')->after('is_route_optimized');
            $table->dateTime('last_stop')->nullable()->after('is_finished');
            $table->longText('driver_current_location')->nullable()->after('last_stop');
            $table->string('approximate_driving_time')->nullable()->after('driver_current_location');
            $table->string('distance')->nullable()->after('approximate_driving_time');
            $table->string('actual_driving_time')->nullable()->after('distance');
            $table->longText('sessionId')->nullable()->after('actual_driving_time');
            $table->enum('is_request_mask_photo', ['Yes', 'No'])->default('No')->after('sessionId');
            $table->text('mask_photo')->nullable()->after('is_request_mask_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regions', function (Blueprint $table) {
        });
    }
};
