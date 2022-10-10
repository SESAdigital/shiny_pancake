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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('state');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('security_id')->nullable();
            $table->unsignedBigInteger('securityGuard_id')->nullable();
            $table->string('estate_fee');
            $table->string('sesa_fee');
            $table->string('no_of_resident_users');
            $table->string('additional_user');
            $table->string('image')->nullable();
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            // $table->longText('description');

            // $table->foreign('estate_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();

            $table->foreign('security_id')->references('id')->on('security_companies')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade');
            $table->foreign('securityGuard_id')->references('id')->on('security_guards')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
};
