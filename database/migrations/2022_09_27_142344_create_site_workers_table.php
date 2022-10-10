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
        Schema::create('site_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('dob');
            $table->string('address');
            $table->string('siteworker_code');
            $table->string('gender');
            $table->string('work_days');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('image');
            $table->longText('message')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_workers');
    }
};
