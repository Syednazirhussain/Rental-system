<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceBookingSignageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_booking_signage', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('booking_id')->unsigned()->nullable()->index('booking_id');
			$table->boolean('is_signage')->nullable()->default(0);
			$table->string('first_name', 191)->nullable();
			$table->string('first_screen_name', 191)->nullable();
			$table->string('first_logo', 191)->nullable();
			$table->string('second_name', 191)->nullable();
			$table->string('second_screen_name', 191)->nullable();
			$table->string('second_logo', 191)->nullable();
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
		Schema::drop('conference_booking_signage');
	}

}
