<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeedBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_feed_backs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('to')->nullable();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('from')->nullable();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->string('feedback')->nullable();
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
        Schema::dropIfExists('user_feed_backs');
    }
}
