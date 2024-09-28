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
        Schema::create('orders_activity', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Order'])->default('Order');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('added_by')->unsigned();
            $table->longText('activity');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('orders_activity');
        Schema::enableForeignKeyConstraints();
    }
};
