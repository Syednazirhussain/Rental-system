<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyHrPreEmploymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_hr_pre_employment', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('company_hr_id')->unsigned()->nullable()->index('company_hr_id');
			$table->string('organization_name', 191)->nullable();
			$table->string('job_title', 191)->nullable();
			$table->text('courses')->nullable();
			$table->date('employed_from')->nullable();
			$table->date('employed_until')->nullable();
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
		Schema::drop('company_hr_pre_employment');
	}

}
