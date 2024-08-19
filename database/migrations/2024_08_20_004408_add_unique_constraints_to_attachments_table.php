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
        Schema::table('attachments', function (Blueprint $table) {
            // Add new columns for unique values
            $table->string('nin_number')->nullable()->unique()->after('card_number');
            $table->string('voter_id_number')->nullable()->unique()->after('nin_number');
            $table->string('license_number')->nullable()->unique()->after('voter_id_number');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attachments', function (Blueprint $table) {
            // Drop the new columns if rolling back
            $table->dropUnique(['nin_number']);
            $table->dropUnique(['voter_id_number']);
            $table->dropUnique(['license_number']);
            
        });
    }


    

};
