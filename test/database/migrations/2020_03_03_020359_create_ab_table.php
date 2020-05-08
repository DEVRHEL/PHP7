<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten');
            $table->string('sdt');
            $table->string('email');
            $table->timestamps();
            // php artisan make:migrations cteate_ab_table
            // php artisan migrate
            // php artisan migrate:rollback
            // php artisan migrate:refresh
            // php artisan migrate:reset
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ab');
    }
}
