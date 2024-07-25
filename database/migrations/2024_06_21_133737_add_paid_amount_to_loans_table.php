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
        // Add payable_amount column
        if (!Schema::hasColumn('loans', 'payable_amount')) {
            Schema::table('loans', function (Blueprint $table) {
                $table->decimal('payable_amount', 28, 8)->default(0.00000000)->after('per_installment');
            });
        }

        // Add paid_amount column
        if (!Schema::hasColumn('loans', 'paid_amount')) {
            Schema::table('loans', function (Blueprint $table) {
                $table->decimal('paid_amount', 28, 2)->unsigned()->default(0)->after('status');
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
        // Remove payable_amount column
        if (Schema::hasColumn('loans', 'payable_amount')) {
            Schema::table('loans', function (Blueprint $table) {
                $table->dropColumn('payable_amount');
            });
        }

        // Remove paid_amount column
        if (Schema::hasColumn('loans', 'paid_amount')) {
            Schema::table('loans', function (Blueprint $table) {
                $table->dropColumn('paid_amount');
            });
        }
    }
};
