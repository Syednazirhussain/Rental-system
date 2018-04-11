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
			$table->string('department', 100)->nullable();
			$table->string('designation', 100)->nullable();
			$table->string('name', 100)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('phone', 15)->nullable();
			$table->string('fax', 15)->nullable();
			$table->string('address', 150)->nullable();
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
