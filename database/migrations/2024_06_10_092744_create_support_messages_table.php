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
        if(!Schema::hasTable('support_messages'))
        {
            Schema::create('support_messages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('support_ticket_id')->default(0);
                $table->unsignedBigInteger('admin_id')->nullable()->default(null);
                $table->longText('message')->nullable();
                $table->timestamps(); 
                
                // Define foreign key constraints
                $table->foreign('support_ticket_id')->references('id')->on('support_tickets')->onDelete('cascade');
                $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
                
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
        Schema::dropIfExists('support_messages');
    }
};
