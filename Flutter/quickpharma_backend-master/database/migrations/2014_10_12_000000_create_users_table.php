<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('business_name')->nullable();
            $table->string('doing_business_as')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('apt')->nullable()->comment('Apt/Suite/Floor');
            $table->text('address')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('userType')->default(1)->comment('0:Super-Admin 1: Pharmacy 2: User');
            $table->tinyInteger('status')->default(1)->comment('0:Inactive 1:Active');
            $table->text('permissions')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $data=[[ 'name'=>'Super Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'userType' => 0,
            'status' => '1',
        ]];
        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
