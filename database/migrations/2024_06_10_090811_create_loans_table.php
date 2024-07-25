<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     *
     * @return void
     * 
     * 
     */
    public function up()
    {
        if (!Schema::hasTable('loans')) {
            Schema::create('loans', function (Blueprint $table) {
                $table->id();
                $table->string('loan_number', 40)->nullable();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('plan_id');
                $table->decimal('amount', 28, 8)->default(0.00000000);
                $table->decimal('per_installment', 28, 8)->default(0.00000000);
                $table->integer('installment_interval')->default(0)->comment('Days');
                $table->integer('delay_value')->default(1);
                $table->decimal('charge_per_installment', 28, 8)->default(0.00000000);
                $table->decimal('delay_charge', 28, 8)->default(0.00000000);
                $table->integer('given_installment')->default(0);
                $table->integer('total_installment')->default(0);
                $table->text('application_form')->nullable();
                $table->text('admin_feedback')->nullable();
                $table->unsignedTinyInteger('status')->default(0)->comment('0 = Pending, 1 = Running, 2 = Paid, 3 = Rejected');
                $table->timestamp('due_notification_sent')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->timestamps();

                // Define foreign key constraints
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('plan_id')->references('id')->on('loan_plans')->onDelete('cascade');
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     * 
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }


};
