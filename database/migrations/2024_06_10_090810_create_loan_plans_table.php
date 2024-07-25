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
         if(!Schema::hasTable('loan_plans'))
         {
            Schema::create('loan_plans', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('category_id')->default(0);
                $table->unsignedInteger('form_id')->default(0);
                $table->string('name', 40);
                $table->string('title', 40)->nullable();
                $table->decimal('minimum_amount', 28, 8)->default(0.00000000);
                $table->decimal('maximum_amount', 28, 8)->default(0.00000000);
                $table->decimal('per_installment', 5, 2)->default(0.00)->comment('%');
                $table->integer('installment_interval')->default(0)->comment('In Day');
                $table->integer('total_installment')->default(0);
                $table->decimal('application_fixed_charge', 28, 8)->default(0.00000000)->comment('Fixed Application charge');
                $table->decimal('application_percent_charge', 28, 8)->default(0.00000000)->comment('Percent Application charge');
                $table->text('instruction')->nullable();
                $table->unsignedInteger('delay_value')->default(1);
                $table->decimal('fixed_charge', 28, 8)->default(0.00000000);
                $table->decimal('percent_charge', 28, 8)->default(0.00000000);
                $table->tinyInteger('is_featured')->default(0)->comment('1->Featured, 0->Non-Featured');
                $table->tinyInteger('status')->default(1);
                $table->timestamps(); // This will create `created_at` and `updated_at` columns
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
        Schema::dropIfExists('loan_plans');
    }
};
