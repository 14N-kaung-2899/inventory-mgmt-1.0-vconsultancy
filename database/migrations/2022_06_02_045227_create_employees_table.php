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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id');

            //Personal
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('gender');
            $table->string('dob');

            //Mail
            $table->string('pmail');
            $table->string('wmail');
            
            //Phone
            $table->string('home');
            $table->string('mobile');

            //Address
            $table->string('line1');
            $table->string('line2');
            $table->unsignedBigInteger('subdistrict_id');
            $table->foreign('subdistrict_id')->references('id')->on('subdistricts')->onUpdate('cascade')->onDelete('cascade');

            //Employment
            $table->unsignedBigInteger('empid');
            $table->foreign('empid')->references('id')->on('employments')->onUpdate('cascade')->onDelete('cascade');

            //Payroll
            $table->unsignedBigInteger('pid');
            $table->foreign('pid')->references('id')->on('payrolls')->onUpdate('cascade')->onDelete('cascade');

            //Office
            $table->unsignedBigInteger('oid');
            $table->foreign('oid')->references('id')->on('offices')->onUpdate('cascade')->onDelete('cascade');

            //Role
            $table->unsignedBigInteger('rid');
            $table->foreign('rid')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
    }
};
