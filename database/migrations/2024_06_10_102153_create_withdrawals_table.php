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
        if (!Schema::hasTable('withdrawals')) {
            Schema::create('withdrawals', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('method_id');
                $table->unsignedBigInteger('user_id');
                $table->decimal('amount', 28, 8)->default(0.00000000);
                $table->string('phone_number')->nullable(); 
                $table->string('currency')->nullable();
                $table->decimal('rate', 28, 8)->default(0.00000000);
                $table->decimal('charge', 28, 8)->default(0.00000000);
                $table->string('trx')->nullable();
                $table->decimal('final_amount', 28, 8)->default(0.00000000);
                $table->decimal('after_charge', 28, 8)->default(0.00000000);
                $table->text('withdraw_information')->nullable();
                $table->tinyInteger('status')->default(0)->comment('1=>success, 2=>pending, 3=>cancel');
                $table->text('admin_feedback')->nullable();
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
        Schema::dropIfExists('withdrawals');
    }
};
