<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomEquipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('room_equipments', function(Blueprint $table)
		{
			$table->foreign('room_id', 'room_equipments_ibfk_1')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('equipment_id', 'room_equipments_ibfk_2')->references('id')->on('conference_equipments')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_equipments', function(Blueprint $table)
		{
			$table->dropForeign('room_equipments_ibfk_1');
			$table->dropForeign('room_equipments_ibfk_2');
		});
	}

}
