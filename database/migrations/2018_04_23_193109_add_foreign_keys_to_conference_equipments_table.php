<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferenceEquipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conference_equipments', function(Blueprint $table)
		{
			$table->foreign('criteria_id', 'conference_equipments_ibfk_1')->references('id')->on('conference_equipments_criteria')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conference_equipments', function(Blueprint $table)
		{
			$table->dropForeign('conference_equipments_ibfk_1');
		});
	}

}
