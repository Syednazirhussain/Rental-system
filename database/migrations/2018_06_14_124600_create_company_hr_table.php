<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyHrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_hr', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->string('first_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('address_1', 191)->nullable();
			$table->string('address_2', 191)->nullable();
			$table->string('post_code', 191)->nullable();
			$table->integer('city_id')->unsigned()->nullable()->index('city');
			$table->integer('state_id')->unsigned()->nullable()->index('company_hr_ibfk_3');
			$table->integer('country_id')->unsigned()->nullable()->index('country');
			$table->string('telephone_job', 191)->nullable();
			$table->string('telephone_private', 191)->nullable();
			$table->string('email_job', 191)->nullable();
			$table->string('email_private', 191)->nullable();
			$table->integer('civil_status_id')->unsigned()->nullable()->index('civil_status_id');
			$table->dateTime('employment_date')->nullable();
			$table->integer('termination_time')->nullable();
			$table->dateTime('employeed_untill')->nullable();
			$table->integer('personal_category')->unsigned()->nullable()->index('personal_category');
			$table->integer('collective_type')->unsigned()->nullable()->index('collective_type');
			$table->integer('employment_form')->unsigned()->nullable()->index('employment_form');
			$table->dateTime('insurance_date')->nullable();
			$table->decimal('insurance_fees', 10)->nullable();
			$table->integer('department')->unsigned()->nullable()->index('department');
			$table->integer('designation')->unsigned()->nullable()->index('designation');
			$table->integer('vacancies')->unsigned()->nullable()->index('vacancies');
			$table->integer('salary_type')->unsigned()->nullable();
			$table->decimal('salary', 10)->nullable();
			$table->integer('employment_percent')->nullable();
			$table->integer('cost_division')->nullable();
			$table->text('courses', 65535)->nullable();
			$table->integer('project')->unsigned()->nullable();
			$table->integer('vat_table')->nullable();
			$table->integer('vacation_days')->nullable();
			$table->integer('father')->nullable();
			$table->integer('mother')->nullable();
			$table->integer('vacation_category')->unsigned()->nullable();
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
		Schema::drop('company_hr');
	}

}
