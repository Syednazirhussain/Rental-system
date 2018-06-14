<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyHrOtherInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_hr_other_info', function(Blueprint $table)
		{
			$table->foreign('company_hr_id', 'company_hr_other_info_ibfk_1')->references('id')->on('company_hr')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_hr_other_info', function(Blueprint $table)
		{
			$table->dropForeign('company_hr_other_info_ibfk_1');
		});
	}

}
