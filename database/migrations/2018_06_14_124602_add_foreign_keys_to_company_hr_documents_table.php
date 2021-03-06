<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyHrDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_hr_documents', function(Blueprint $table)
		{
			$table->foreign('company_hr_id', 'company_hr_documents_ibfk_1')->references('id')->on('company_hr')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_hr_documents', function(Blueprint $table)
		{
			$table->dropForeign('company_hr_documents_ibfk_1');
		});
	}

}
