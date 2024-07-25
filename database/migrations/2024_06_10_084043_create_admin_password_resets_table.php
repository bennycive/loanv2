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
        if(!Schema::hasTable('admin_password_resets'))
        {
            Schema::create('admin_password_resets', function (Blueprint $table) {
                $table->id();
                $table->string('email', 40)->nullable();
                $table->string('token', 40)->nullable();
                $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('admin_password_resets');
    }
};
