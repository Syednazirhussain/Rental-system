<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyHrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_hr', function(Blueprint $table)
		{
			$table->foreign('city_id', 'company_hr_ibfk_1')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('vacancies', 'company_hr_ibfk_10')->references('id')->on('hr_company_designation')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('company_id', 'company_hr_ibfk_11')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('country_id', 'company_hr_ibfk_2')->references('id')->on('countries')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('state_id', 'company_hr_ibfk_3')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('civil_status_id', 'company_hr_ibfk_4')->references('id')->on('hr_civil_status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('personal_category', 'company_hr_ibfk_5')->references('id')->on('hr_personal_cat')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('collective_type', 'company_hr_ibfk_6')->references('id')->on('hr_collective_type')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('employment_form', 'company_hr_ibfk_7')->references('id')->on('hr_employment_form')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('department', 'company_hr_ibfk_8')->references('id')->on('hr_personal_cat')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('designation', 'company_hr_ibfk_9')->references('id')->on('hr_company_designation')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_hr', function(Blueprint $table)
		{
			$table->dropForeign('company_hr_ibfk_1');
			$table->dropForeign('company_hr_ibfk_10');
			$table->dropForeign('company_hr_ibfk_11');
			$table->dropForeign('company_hr_ibfk_2');
			$table->dropForeign('company_hr_ibfk_3');
			$table->dropForeign('company_hr_ibfk_4');
			$table->dropForeign('company_hr_ibfk_5');
			$table->dropForeign('company_hr_ibfk_6');
			$table->dropForeign('company_hr_ibfk_7');
			$table->dropForeign('company_hr_ibfk_8');
			$table->dropForeign('company_hr_ibfk_9');
		});
	}

}
