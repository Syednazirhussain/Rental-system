<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyHrDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_hr_documents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_hr_id')->unsigned()->nullable()->index('company_hr_id');
			$table->string('file_name', 191)->nullable();
			$table->timestamps();
			$table->dateTime('deleted_at')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_hr_documents');
	}

}
