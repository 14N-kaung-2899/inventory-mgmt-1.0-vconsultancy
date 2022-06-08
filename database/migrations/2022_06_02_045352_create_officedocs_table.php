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
        Schema::create('officedocs', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->string('type');
            
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
        Schema::dropIfExists('officedocs');
    }
};
