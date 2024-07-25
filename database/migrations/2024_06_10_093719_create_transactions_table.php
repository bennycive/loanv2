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
        if(!Schema::hasTable('transactions'))
        {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->default(0);
                $table->decimal('amount', 28, 8)->default(0);
                $table->string('phone_number')->nullable(); 
                $table->decimal('charge', 28, 8)->default(0);
                $table->decimal('post_balance', 28, 8)->default(0);
                $table->string('trx_type', 40)->nullable();
                $table->string('trx', 40)->nullable();
                $table->string('details', 255)->nullable();
                $table->string('remark', 40)->nullable();
                $table->timestamps(); 
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
        Schema::dropIfExists('transactions');
    }
};
