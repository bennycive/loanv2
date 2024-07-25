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
       if(!Schema::hasTable('support_attachments'))
       {
        Schema::create('support_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_message_id')->nullable();
            $table->string('attachment', 255)->nullable();
            $table->timestamps(); // This will create `created_at` and `updated_at` columns
            // Define foreign key constraint
            $table->foreign('support_message_id')->references('id')->on('support_messages')->onDelete('cascade');
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
        Schema::dropIfExists('support_attachments');
    }
};
