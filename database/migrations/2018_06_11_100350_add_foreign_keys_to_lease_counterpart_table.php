<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLeaseCounterpartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lease_counterpart', function(Blueprint $table)
		{
			$table->foreign('lease_partner_id', 'lease_counterpart_ibfk_1')->references('id')->on('lease_partner')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lease_counterpart', function(Blueprint $table)
		{
			$table->dropForeign('lease_counterpart_ibfk_1');
		});
	}

}
