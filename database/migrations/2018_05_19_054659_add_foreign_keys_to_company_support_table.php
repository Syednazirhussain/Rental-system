<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanySupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_support', function(Blueprint $table)
		{
			$table->foreign('category_id', 'category_id')->references('id')->on('support_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('priority_id', 'priority_id')->references('id')->on('support_priorities')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_id', 'status_id')->references('id')->on('support_status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_support', function(Blueprint $table)
		{
			$table->dropForeign('category_id');
			$table->dropForeign('priority_id');
			$table->dropForeign('status_id');
			$table->dropForeign('user_id');
		});
	}

}
