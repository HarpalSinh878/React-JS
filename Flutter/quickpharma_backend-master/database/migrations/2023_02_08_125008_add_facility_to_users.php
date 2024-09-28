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
        Schema::table('users', function (Blueprint $table) {
            $table->string('facility')->nullable()->default('New York')->after('longitude');
            $table->enum('current_status', ['Open', 'Close'])->default('Open')->after('facility');
            $table->bigInteger('copay_limit')->nullable()->default('0')->after('current_status');
            $table->bigInteger('attempts_limit')->nullable()->default('0')->after('copay_limit');
            $table->bigInteger('order_rate')->nullable()->default('0')->after('attempts_limit');
            $table->longText('special_instructions')->nullable()->after('order_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
