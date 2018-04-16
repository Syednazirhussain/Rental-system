<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('companies_id')->nullable();
			$table->integer('clients_id')->nullable();
			$table->integer('buildings_id')->nullable();
			$table->integer('rooms_id')->nullable();
			$table->integer('company_services_id')->nullable();
			$table->decimal('qty', 20, 0)->nullable();
			$table->date('invoice_date')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('moms', 10, 0)->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->string('remarks', 50)->nullable();
			$table->integer('invoices_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_details');
	}

}