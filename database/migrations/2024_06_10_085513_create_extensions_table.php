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
        if(!Schema::hasTable('extensions'))
        {
            Schema::create('extensions', function (Blueprint $table) {
                $table->id();
                $table->string('act', 40)->nullable();
                $table->string('name', 40)->nullable();
                $table->text('description')->nullable();
                $table->string('image', 255)->nullable();
                $table->text('script')->nullable();
                $table->text('shortcode')->nullable()->comment('object');
                $table->text('support')->nullable()->comment('help section');
                $table->tinyInteger('status')->default(1)->comment('1=>enable, 2=>disable');
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
        Schema::dropIfExists('extensions');
    }
};
