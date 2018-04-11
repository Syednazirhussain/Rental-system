<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->nullable();
			$table->string('second_name', 191)->nullable();
			$table->string('logo')->nullable()->default('default.png');
			$table->text('description', 65535)->nullable();
			$table->string('address', 191)->nullable();
			$table->string('zipcode', 20)->nullable();
			$table->string('phone', 15)->nullable();
			$table->integer('country_id')->unsigned()->nullable()->index('country_id');
			$table->integer('state_id')->unsigned()->nullable()->index('state_id');
			$table->integer('city_id')->unsigned()->nullable()->index('city_id');
			$table->string('uuid', 191)->nullable()->unique('uuid');
			$table->string('user_role_code', 50)->nullable()->index('user_role_code');
			$table->boolean('max_users')->nullable()->default(1);
			$table->integer('user_status_id')->unsigned()->nullable()->index('user_status_id');
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
		Schema::drop('companies');
	}

}
