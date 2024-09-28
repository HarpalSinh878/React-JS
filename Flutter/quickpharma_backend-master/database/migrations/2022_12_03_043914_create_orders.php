<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->enum('status', ['Ready to Print', 'Ready for Pickup', 'Pickup Occurred', 'Ready for Delivery', 'Route Optimized', 'Driver Out', 'Delivered', 'Delivery Attempted', 'Returned', 'Rejected', 'Back to Pharmacy', 'Investigation', 'Other Date Delivery', 'Ready To Optimize', 'On Its Way To Facility','Not Present','Recipient Refused','Skipped','Wrong Address'])->default('Ready to Print');
            $table->enum('sub_status', ['Open', 'Scheduled'])->default('Open');
            $table->bigInteger('user_id')->unsigned()->comment('Pharmacy User');
            $table->bigInteger('recipient_id')->unsigned();
            $table->bigInteger('driver_id')->default(0);
            $table->bigInteger('dispatcher_id')->default(0);
            $table->enum('request_call_upon_arrival', ['Yes', 'No'])->default('No');
            $table->enum('include_insurance', ['Yes', 'No'])->default('No');
            $table->string('order_total_price')->default(0);
            $table->string('insurance_rate')->default(0.00);
            $table->enum('delivery_methods_type', ['idrequired', 'face2face', 'inperson', 'signlink', 'nosign', 'noask'])->comment("idrequired :FACE-TO-FACE ID & SIGNATURE REQUIRED | face2face : FACE-TO-FACE SIGNATURE REQUIRED | inperson : FACE-TO-FACE NO SIGNATURE REQUIRED | signlink: ONLINE SIGNATURE | nosign : SIGNATURE OPTIONAL | noask : NO-CONTACT DELIVERY")->default('face2face');
            $table->text('special_instructions')->nullable();
            $table->enum('weight', ['small', 'medium', 'large'])->default('small');
            $table->string('items')->nullable();
            $table->string('copay')->nullable();
            $table->enum('order_type', ['regular', 'Time Window Next Day','Same Day'])->default('regular');
            $table->enum('order_condition', ['regular', 'priority','emergency'])->default('regular');
            $table->enum('subtype_fridge', ['Yes', 'No'])->default('No');
            $table->string('store_in_fridge')->nullable()->comment("Yes | No");
            $table->enum('subtype_confidential', ['Yes', 'No'])->default('No');
            $table->enum('subtype_sensitive', ['Yes', 'No'])->default('No');
            $table->enum('subtype_hazardous', ['Yes', 'No'])->default('No');
            $table->enum('subtype_controlled', ['Yes', 'No'])->default('No');
            $table->enum('subtype_woundcare', ['Yes', 'No'])->default('No');
            $table->string('documents_to_sign_by_recipient')->nullable();
            $table->date('date_to_deliver')->nullable();
            $table->time('time_to_deliver')->nullable();;
            $table->string('time_window_deliveries')->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time_min');
            $table->time('pickup_time_max');
            $table->enum('recipient_email_to_owner', ['Yes', 'No'])->default('No');
            $table->string('operator_initials');
            $table->enum('is_sms', ['Yes', 'No'])->default('No');
            $table->enum('is_call', ['Yes', 'No'])->default('No');
            $table->string('condition')->nullable();
            $table->string('facility')->nullable();
            $table->string('hub')->nullable();
            $table->string('contents')->nullable();
            $table->string('note_added')->nullable();
            $table->enum('is_copay_payed', ['Yes', 'No'])->default('No');
            $table->bigInteger('added_by');
            $table->bigInteger('attempts')->default(0);
            $table->string('order_activity')->nullable()->comment('Delivered | Wrong Address | Not Present | Recipient Refused');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->point('location')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipient_id')->references('id')->on('recipients')->onDelete('cascade');
            
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
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
};
