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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payout')->nullable()->default(0)->after('regions_id');
            $table->string('eta_date_time')->nullable()->after('payout');
            $table->intger('not_paying_copay_action	')->nullable()->after('eta_date_time')->comment('<-- 1 --> Allow Rx2Go to Give the Medication to the Patient, even if the patient does not pay the copay.<-- 2 --> Do not give the medicine to the patient, bring it back to the pharmacy.<-- 3 --> Amount of copay will be available on all necessary legal documents, But we will not attempt to collect the copay.');
            $table->enum('is_pickup_order', ['Yes', 'No'])->nullable()->default('No')->after('not_paying_copay_action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
