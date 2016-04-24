<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSavingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('savings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('savtype_id');
			$table->integer('sav_mother')->nullable();
			$table->integer('cust_id');
			$table->integer('ltrans_id')->nullable();
			$table->integer('sav_date');
			$table->decimal('amount', 20, 2);
			$table->integer('sav_receipt')->nullable();
			$table->integer('sav_slip');
			$table->integer('user_id');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('savings');
	}

}
