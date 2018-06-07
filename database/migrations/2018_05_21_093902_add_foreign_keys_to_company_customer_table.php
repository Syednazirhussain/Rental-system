<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_customer', function(Blueprint $table)
		{
			$table->foreign('user_id', 'company_customer_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('company_id', 'company_customer_ibfk_2')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_customer', function(Blueprint $table)
		{
			$table->dropForeign('company_customer_ibfk_1');
			$table->dropForeign('company_customer_ibfk_2');
		});
	}

}
