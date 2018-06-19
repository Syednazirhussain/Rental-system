<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyHrNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_hr_notes', function(Blueprint $table)
		{
			$table->foreign('company_hr_id', 'company_hr_notes_ibfk_1')->references('id')->on('company_hr')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'company_hr_notes_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_hr_notes', function(Blueprint $table)
		{
			$table->dropForeign('company_hr_notes_ibfk_1');
			$table->dropForeign('company_hr_notes_ibfk_2');
		});
	}

}
