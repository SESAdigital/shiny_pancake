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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('propertyCode');
            $table->string('business_name')->nullable();
            $table->unsignedBigInteger('estate_id');
            $table->unsignedBigInteger('property_type_id');
            // $table->unsignedBigInteger('property_category_id');
            $table->string('property_category');
            $table->string('image');
            $table->string('street_name');
            $table->longText('Address_description');
            $table->longText('flat_block_number');
            $table->timestamps();
            
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            // $table->foreign('property_category_id')->references('id')->on('property_categories')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
