<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('support', function(Blueprint $table)
		{
			$table->foreign('category_id', 'support_ibfk_1')->references('id')->on('support_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('priority_id', 'support_ibfk_2')->references('id')->on('support_priorities')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('status_id', 'support_ibfk_3')->references('id')->on('support_status')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'support_ibfk_4')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('support', function(Blueprint $table)
		{
			$table->dropForeign('support_ibfk_1');
			$table->dropForeign('support_ibfk_2');
			$table->dropForeign('support_ibfk_3');
			$table->dropForeign('support_ibfk_4');
		});
	}

}
