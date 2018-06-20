<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanySupportPrioritiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_support_priorities', function(Blueprint $table)
		{
			$table->foreign('company_id', 'company_support_priorities_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_support_priorities', function(Blueprint $table)
		{
			$table->dropForeign('company_support_priorities_ibfk_1');
		});
	}

}
