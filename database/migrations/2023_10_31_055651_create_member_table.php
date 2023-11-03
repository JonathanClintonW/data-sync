<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::connection('mysql')->create('member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('CustName');
            $table->string('PhoneNumber1');
            $table->string('PhoneNumber2')->nullable();
            $table->string('PhoneNumber3')->nullable();
            $table->string('Address')->nullable();
            $table->string('Address2')->nullable();
            $table->string('Address3')->nullable();
            $table->string('City')->nullable();
            $table->string('ZipCode')->nullable();
            $table->string('Email')->nullable();
            $table->integer('FK_MEMBER_ID')->nullable();
            $table->string('MemberID')->nullable();
            $table->string('_ContactID')->nullable();
            $table->string('CreatedBy')->nullable();
            $table->timestamp('CreatedOn')->nullable();
            $table->string('UpdatedBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable()->default(null);
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable();
            $table->string('PrefReward1')->nullable();
            $table->string('PrefReward2')->nullable();
            $table->boolean('IsMemberPC')->nullable();
            $table->boolean('IsWillingToPC')->nullable();
            $table->boolean('CLIsCust')->nullable();
            $table->boolean('CLNewChild')->nullable();
            $table->string('iCity')->nullable();
            $table->string('iProvince')->nullable();
            $table->string('SpouseName')->nullable();
            $table->string('BestTimeToCall')->nullable();
            $table->boolean('MemBekerja')->nullable();
            $table->date('CustBirthDate')->nullable();
            $table->string('JenisKelamin')->nullable();
            $table->string('RefCode')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('ciam_uuid')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mysql')->dropIfExists('member');
    }
};
