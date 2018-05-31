<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomSittingArrangementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('room_sitting_arrangements', function(Blueprint $table)
		{
			$table->foreign('room_id', 'room_sitting_arrangements_ibfk_1')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('company_id', 'room_sitting_arrangements_ibfk_2')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('building_id', 'room_sitting_arrangements_ibfk_3')->references('id')->on('company_buildings')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_sitting_arrangements', function(Blueprint $table)
		{
			$table->dropForeign('room_sitting_arrangements_ibfk_1');
			$table->dropForeign('room_sitting_arrangements_ibfk_2');
			$table->dropForeign('room_sitting_arrangements_ibfk_3');
		});
	}

}
