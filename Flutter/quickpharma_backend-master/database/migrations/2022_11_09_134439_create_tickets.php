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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->longText('description')->nullable();
            $table->enum('priority', ['Moderate', 'Low', 'Normal', 'High', 'Emergency'])->default('Moderate');
            $table->enum('status', ['Open', 'Assigned', 'In Progress', 'Ready to Resolve', 'Resolved', 'On Hold', 'Rejected'])->default('Open');
            $table->string('type')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('managed_by')->nullable();
            $table->string('order_id')->nullable();
            $table->bigInteger('added_by')->unsigned();
            $table->dateTime('last_status_update');
            $table->string('last_updated_by')->nullable();
            $table->string('close')->nullable();
            $table->string('close_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
        Schema::enableForeignKeyConstraints();
    }
};
