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
        Schema::create('estate_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estate_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('phone');
            $table->string('staff_code');
            $table->string('dob');
            $table->string('address');
            $table->string('gender');
            $table->string('work_days');
            $table->longText('message')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();



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
        Schema::dropIfExists('estate_staff');
    }
};
