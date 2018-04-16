<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_contracts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->string('number', 100)->nullable();
			$table->text('content', 65535)->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->date('termindation_date')->nullable();
			$table->string('payment_method', 50)->nullable()->index('payment_method');
			$table->integer('payment_cycle');
			$table->decimal('discount', 10)->unsigned()->default(0.00);
			$table->string('discount_type', 50)->default('percent');
			$table->timestamps();
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
		Schema::drop('company_contracts');
	}

}
