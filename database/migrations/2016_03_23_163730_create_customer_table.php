<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(/**
		 * @param Blueprint $table
         */
			'customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number', 100)->nullable();
			$table->string('name', 250)->nullable();
			$table->string('lastname', 250)->nullable();
			$table->date('dob')->nullable();
			$table->string('sex', 10)->nullable();
			$table->string('occupation', 100)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('address', 250)->nullable();
			$table->string('phone', 50)->nullable();
			$table->string('email', 100)->nullable();
			$table->boolean('active');
			$table->integer('users_id')->unsigned()->nullable();
			$table->foreign('users_id')->references('id')->on('users');
			$table->string('image')->default('/img/avatar.png');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at');
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer');
	}

}
