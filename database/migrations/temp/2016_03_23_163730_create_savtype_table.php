<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSavtypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('savtype', function(Blueprint $table)
		{
			$table->integer('savtype_id', true);
			$table->string('savtype_type', 20);
			$table->string('savtype_short', 8);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('savtype');
	}

}
