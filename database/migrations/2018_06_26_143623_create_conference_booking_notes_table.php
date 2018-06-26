<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceBookingNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_booking_notes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('conference_booking_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->string('code', 191)->nullable();
			$table->text('note', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conference_booking_notes');
	}

}
