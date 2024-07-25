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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname', 40)->nullable();
            $table->string('lastname', 40)->nullable();
            $table->string('username', 40)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('country_code', 40)->nullable();
            $table->string('mobile', 40)->nullable();
            $table->unsignedBigInteger('ref_by')->default(0);
            $table->decimal('balance', 28, 8)->default(0);
            $table->text('address')->nullable()->comment('contains full address');
            $table->tinyInteger('status')->default(1)->comment('0: banned, 1: active');
            $table->text('kyc_data')->nullable();
            $table->tinyInteger('kv')->default(0)->comment('0: KYC Unverified, 2: KYC pending, 1: KYC verified');
            $table->tinyInteger('ev')->default(0)->comment('0: email unverified, 1: email verified');
            $table->tinyInteger('sv')->default(0)->comment('0: mobile unverified, 1: mobile verified');
            $table->tinyInteger('profile_complete')->default(0);
            $table->string('ver_code', 40)->nullable()->comment('stores verification code');
            $table->dateTime('ver_code_send_at')->nullable()->comment('verification send time');
            $table->tinyInteger('ts')->default(0)->comment('0: 2fa off, 1: 2fa on');
            $table->tinyInteger('tv')->default(1)->comment('0: 2fa unverified, 1: 2fa verified');
            $table->string('tsc', 255)->nullable();
            $table->string('ban_reason', 255)->nullable();
            $table->string('login_by', 40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['firstname', 'lastname', 'username', 'image', 'country_code', 'mobile', 'ref_by', 'balance', 'address', 'status', 'kyc_data', 'kv', 'ev', 'sv', 'profile_complete', 'ver_code', 'ver_code_send_at', 'ts', 'tv', 'tsc', 'ban_reason', 'login_by']);
        });
        
    }
};
