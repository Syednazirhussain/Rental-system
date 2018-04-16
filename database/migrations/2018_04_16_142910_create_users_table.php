<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100)->unique();
			$table->string('password', 191);
			$table->string('user_role_code', 50)->nullable()->index('user_role_code');
			$table->integer('country_id')->unsigned()->nullable()->index('country_id');
			$table->integer('state_id')->unsigned()->nullable()->index('state_id');
			$table->integer('city_id')->unsigned()->nullable()->index('city_id');
			$table->integer('user_status_id')->unsigned()->nullable()->index('user_status_id');
			$table->string('uuid', 191)->nullable()->unique('uuid');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
