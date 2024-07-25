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
        if(!Schema::hasTable('notification_logs'))
        {
            Schema::create('notification_logs', function (Blueprint $table) {

                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('sender', 40)->nullable();
                $table->string('sent_from', 40)->nullable();
                $table->string('sent_to', 40)->nullable();
                $table->string('subject', 255)->nullable();
                $table->text('message')->nullable();
                $table->string('notification_type', 40)->nullable();
                $table->timestamps(); // This will create `created_at` and `updated_at` columns
                
                // Define foreign key constraint
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('notification_logs');
    }
};
