<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('room_notes', function(Blueprint $table)
		{
			$table->foreign('room_id', 'room_notes_ibfk_1')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'room_notes_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_notes', function(Blueprint $table)
		{
			$table->dropForeign('room_notes_ibfk_1');
			$table->dropForeign('room_notes_ibfk_2');
		});
	}

}
