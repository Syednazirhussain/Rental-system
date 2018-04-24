<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferenceBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conference_bookings', function(Blueprint $table)
		{
			$table->foreign('duration_code', 'conference_bookings_ibfk_1')->references('code')->on('conference_durations')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('payment_method_code', 'conference_bookings_ibfk_2')->references('code')->on('payment_methods')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('room_layout_id', 'conference_bookings_ibfk_3')->references('id')->on('conference_room_layout')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conference_bookings', function(Blueprint $table)
		{
			$table->dropForeign('conference_bookings_ibfk_1');
			$table->dropForeign('conference_bookings_ibfk_2');
			$table->dropForeign('conference_bookings_ibfk_3');
		});
	}

}
