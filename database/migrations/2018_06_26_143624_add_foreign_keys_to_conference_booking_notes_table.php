<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferenceBookingNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conference_booking_notes', function(Blueprint $table)
		{
			$table->foreign('user_id', 'conference_booking_notes_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conference_booking_notes', function(Blueprint $table)
		{
			$table->dropForeign('conference_booking_notes_ibfk_1');
		});
	}

}
