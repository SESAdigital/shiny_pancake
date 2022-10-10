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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type');
            $table->string('userCode');
            $table->string('phone');
            $table->string('id_type');
            $table->string('id_number');
            $table->string('status');
            $table->string('gender');
            $table->string('image');
            $table->integer('otp')->nullable();
            $table->unsignedBigInteger('estate_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');


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
};
