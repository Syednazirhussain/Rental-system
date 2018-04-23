<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConferenceBookingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conference_booking_items', function(Blueprint $table)
		{
			$table->foreign('booking_id', 'conference_booking_items_ibfk_1')->references('id')->on('conference_bookings')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conference_booking_items', function(Blueprint $table)
		{
			$table->dropForeign('conference_booking_items_ibfk_1');
		});
	}

}
