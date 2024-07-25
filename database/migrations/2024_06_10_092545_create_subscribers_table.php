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
         if(!Schema::hasTable('subscribers'))
         {
            Schema::create('subscribers', function (Blueprint $table) {
                $table->id();
                $table->string('email', 40)->nullable();
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
        Schema::dropIfExists('subscribers');
    }
};
