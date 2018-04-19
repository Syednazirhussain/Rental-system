<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_invoice_items', function(Blueprint $table)
		{
			$table->foreign('company_id', 'company_invoice_items_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('company_module_id', 'company_invoice_items_ibfk_2')->references('id')->on('company_modules')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('invoice_id', 'company_invoice_items_ibfk_3')->references('id')->on('company_invoices')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_invoice_items', function(Blueprint $table)
		{
			$table->dropForeign('company_invoice_items_ibfk_1');
			$table->dropForeign('company_invoice_items_ibfk_2');
			$table->dropForeign('company_invoice_items_ibfk_3');
		});
	}

}
