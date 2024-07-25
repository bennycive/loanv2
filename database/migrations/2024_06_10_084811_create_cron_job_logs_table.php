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
        if(!Schema::hasTable('cron_job_logs'))
        
        {
            Schema::create('cron_job_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('cron_job_id')->default(0);
                $table->dateTime('start_at')->nullable();
                $table->dateTime('end_at')->nullable();
                $table->unsignedInteger('duration')->default(0);
                $table->text('error')->nullable();
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
        Schema::dropIfExists('cron_job_logs');
    }
};
