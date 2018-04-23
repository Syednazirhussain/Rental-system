<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_contracts', function(Blueprint $table)
		{
			$table->foreign('company_id', 'company_contracts_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('payment_method', 'company_contracts_ibfk_2')->references('code')->on('payment_methods')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_contracts', function(Blueprint $table)
		{
			$table->dropForeign('company_contracts_ibfk_1');
			$table->dropForeign('company_contracts_ibfk_2');
		});
	}

}
