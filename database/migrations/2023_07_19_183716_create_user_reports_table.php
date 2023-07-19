<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reported_to')->nullable();
            $table->foreign('reported_to')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reported_from')->nullable();
            $table->foreign('reported_from')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reason_id')->nullable();
            $table->foreign('reason_id')->references('id')->on('report_reasons')->onDelete('cascade');
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
        Schema::dropIfExists('user_reports');
    }
}
