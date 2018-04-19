<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_invoice_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('invoice_id')->unsigned()->nullable()->index('invoice_id');
			$table->integer('company_module_id')->unsigned()->nullable()->index('company_module_id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_invoice_items');
	}

}
