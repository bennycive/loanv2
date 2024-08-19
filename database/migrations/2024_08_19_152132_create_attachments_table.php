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
     * 
     * 
     */
    public function up()

    {
    if(!Schema::hasTable('attachments')){
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users table
            $table->string('attachment_type'); // e.g., NIN, VoterID, DrivingLicense
            $table->string('card_number')->nullable(); // Card number
            $table->string('license_category')->nullable(); // License category (if applicable)
            $table->string('front_image')->nullable(); // Path to the front image
            $table->string('back_image')->nullable(); // Path to the back image
            $table->timestamps();
        });
    }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};
