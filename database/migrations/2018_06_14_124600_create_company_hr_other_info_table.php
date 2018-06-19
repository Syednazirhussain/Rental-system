<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyHrOtherInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_hr_other_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_hr_id')->unsigned()->nullable()->index('company_hr_id');
			$table->text('languages')->nullable();
			$table->boolean('driving_license')->nullable();
			$table->text('skills')->nullable();
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
		Schema::drop('company_hr_other_info');
	}

}
