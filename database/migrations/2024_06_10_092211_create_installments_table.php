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
        if(!Schema::hasTable('installments'))
        {
            Schema::create('installments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('loan_id');
                $table->decimal('delay_charge', 28, 8)->unsigned()->default(0.00000000);
                $table->date('installment_date')->nullable();
                $table->timestamp('given_at')->nullable();
                $table->timestamps(); // This will create `created_at` and `updated_at` columns
                
                // Define foreign key constraint
                $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
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
        Schema::dropIfExists('installments');
    }
};
