<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceBookingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_booking_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('booking_id')->unsigned()->index('booking_id');
			$table->string('entity_type', 191)->nullable()->index('entity_type');
			$table->string('entity_name', 191);
			$table->decimal('entity_price', 10)->unsigned();
			$table->integer('entity_qty')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conference_booking_items');
	}

}
