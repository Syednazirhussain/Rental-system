<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomLayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('room_layouts', function(Blueprint $table)
		{
			$table->foreign('room_id', 'room_layouts_ibfk_1')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('room_layout_id', 'room_layouts_ibfk_2')->references('id')->on('conference_room_layout')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_layouts', function(Blueprint $table)
		{
			$table->dropForeign('room_layouts_ibfk_1');
			$table->dropForeign('room_layouts_ibfk_2');
		});
	}

}
