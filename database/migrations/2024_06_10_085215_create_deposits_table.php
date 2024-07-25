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
         if(!Schema::hasTable('deposits'))
         {
            Schema::create('deposits', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('user_id')->default(0);
                $table->unsignedInteger('method_code')->default(0);
                $table->decimal('amount', 28, 8)->default(0);
                $table->string('method_currency', 40)->nullable();
                $table->decimal('charge', 28, 8)->default(0);
                $table->decimal('rate', 28, 8)->default(0);
                $table->decimal('final_amo', 28, 8)->default(0);
                $table->text('detail')->nullable();
                $table->string('btc_amo', 255)->nullable();
                $table->string('btc_wallet', 255)->nullable();
                $table->string('trx', 40)->nullable();
                $table->unsignedInteger('payment_try')->default(0);
                $table->tinyInteger('status')->default(0)->comment('1=>success, 2=>pending, 3=>cancel');
                $table->tinyInteger('from_api')->default(0);
                $table->string('admin_feedback', 255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->string('phone_number', 13)->nullable(); 
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
        Schema::dropIfExists('deposits');
    }
};
