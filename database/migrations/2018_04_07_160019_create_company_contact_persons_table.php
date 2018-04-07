<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyContactPersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_contact_persons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->string('department', 100);
			$table->string('designation', 100);
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('phone', 15);
			$table->string('fax', 15);
			$table->string('address', 150);
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
		Schema::drop('company_contact_persons');
	}

}
