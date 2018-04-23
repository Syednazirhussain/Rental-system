<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('swedish_name', 50)->nullable();
			$table->string('english_name', 50)->nullable();
			$table->date('date_created')->nullable();
			$table->integer('companies_id')->nullable();
			$table->string('shortcuts', 50)->nullable();
			$table->float('capacity', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}

}
