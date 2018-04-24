<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_invoices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->integer('payment_cycle_id')->unsigned()->nullable()->index('payment_cycle_id');
			$table->string('payment_cycle', 50)->nullable();
			$table->decimal('discount', 10)->unsigned()->default(0.00);
			$table->decimal('tax', 10)->unsigned()->default(0.00);
			$table->decimal('total', 10)->unsigned()->nullable();
			$table->string('status', 50)->nullable()->default('unpaid');
			$table->string('file_name', 191)->nullable();
			$table->date('due_date')->nullable();
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
		Schema::drop('company_invoices');
	}

}
