<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('token')->nullable();
            $table->string('dob')->nullable();
            $table->string('helmet_color')->nullable();
            $table->string('team_color')->nullable();
            // $table->string('car_number')->nullable();
            // $table->string('favourite_driver')->nullable();
            // $table->string('favourite_team')->nullable();
            // $table->string('favourite_race')->nullable();
            // $table->string('country')->nullable();
            $table->string('msg_ribbon')->nullable();
            $table->unsignedBigInteger('car_number_id')->nullable();
            $table->foreign('car_number_id')->references('id')->on('car_numbers')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->boolean('status')->nullable()->default(1);
            $table->string('otp')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
