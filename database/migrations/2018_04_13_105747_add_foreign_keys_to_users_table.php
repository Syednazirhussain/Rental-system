<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('country_id')->references('Id')->on('countries')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_role_code')->references('code')->on('user_roles')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('user_status_id')->references('id')->on('user_status')->onUpdate('CASCADE')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_city_id_foreign');
			$table->dropForeign('users_country_id_foreign');
			$table->dropForeign('users_state_id_foreign');
			$table->dropForeign('users_user_role_code_foreign');
			$table->dropForeign('users_user_status_id_foreign');
		});
	}

}
