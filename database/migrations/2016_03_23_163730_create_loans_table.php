<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number', 100)->nullable();
			$table->string('status', 100)->nullable();
			$table->string('purpose', 250)->nullable();
			$table->integer('period')->nullable();
			$table->decimal('amount', 25, 2);
			$table->string('reference', 100)->nullable();

			$table->integer('loanstatus_id');
			$table->string('loan_no', 20);
			$table->integer('loan_date');
			$table->integer('loan_dateout');
			$table->integer('loan_issued');
			$table->integer('loan_principal');
			$table->float('loan_interest', 10, 0);
			$table->integer('loan_appfee_receipt');
			$table->integer('loan_fee');
			$table->integer('loan_fee_receipt');
			$table->decimal('loan_rate', 11, 0);
			$table->integer('loan_repaytotal');
			$table->integer('loan_repaystart');
			$table->string('loan_sec1', 250);
			$table->string('loan_sec2', 250);
			$table->integer('loan_guarant1');
			$table->integer('loan_guarant2');
			$table->integer('loan_guarant3');
			$table->integer('loan_feepaid')->default(0);
			$table->integer('loan_created')->nullable();
			$table->integer('customer_id')->unsigned()->nullable();
			$table->foreign('customer_id')->references('id')->on('customers');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('loans');
	}

}
