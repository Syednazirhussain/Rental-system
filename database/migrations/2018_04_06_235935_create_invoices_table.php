<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('companies_id')->nullable();
			$table->integer('company_modules_id')->nullable();
			$table->integer('cash_services_id')->nullable();
			$table->integer('rooms_id')->nullable();
			$table->integer('company_services_id')->nullable();
			$table->date('idate')->nullable();
			$table->integer('invoice_types_id')->nullable();
			$table->integer('clients_id')->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->integer('users_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}