<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_invoices', function(Blueprint $table)
		{
			$table->foreign('company_id', 'company_invoices_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('payment_cycle_id', 'company_invoices_ibfk_2')->references('id')->on('payment_cycles')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_invoices', function(Blueprint $table)
		{
			$table->dropForeign('company_invoices_ibfk_1');
			$table->dropForeign('company_invoices_ibfk_2');
		});
	}

}
