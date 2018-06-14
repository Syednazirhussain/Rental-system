<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHrCompanyEmploymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hr_company_employment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('employment_date')->nullable();
			$table->integer('termination_time')->nullable();
			$table->dateTime('employeed_untill')->nullable();
			$table->integer('personal_category')->nullable();
			$table->integer('collective_type')->nullable();
			$table->integer('employment_form')->nullable();
			$table->dateTime('insurance_date')->default('0000-00-00 00:00:00');
			$table->integer('insurance_fees');
			$table->integer('department')->nullable();
			$table->integer('designation')->nullable();
			$table->integer('vacancies')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hr_company_employment');
	}

}
