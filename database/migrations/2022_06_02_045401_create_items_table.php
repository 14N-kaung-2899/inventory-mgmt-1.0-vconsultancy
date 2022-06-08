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
        Schema::create('items', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->string('owner');

            $table->string('itemid');
            $table->string('qrcode');

            //Storage
            $table->unsignedBigInteger('sid');
            $table->foreign('sid')->references('id')->on('storages')->onUpdate('cascade')->onDelete('cascade');
            
            //Category
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');            
            
            //Employee
            $table->unsignedBigInteger('eid');
            $table->foreign('eid')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade'); 
            
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
        Schema::dropIfExists('items');
    }
};
