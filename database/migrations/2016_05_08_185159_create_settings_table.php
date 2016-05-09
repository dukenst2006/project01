<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name', 200)->nullable();
            $table->string('app_description', 500)->nullable();
            $table->string('app_email', 100)->nullable();
            $table->string('app_phone', 100)->nullable();
            $table->decimal('us_rate', 10, 2);
            $table->decimal('euro_rate', 10, 2);
            $table->decimal('peso_rate', 10, 2);
            $table->decimal('canadian_rate', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('mini_bal', 10, 2);
            $table->string('currency',6);
            $table->string('country',100);
            $table->string('adress',200);
            $table->string('app_contact',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
