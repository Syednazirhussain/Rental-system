<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceBookingDraftTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_booking_draft', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('booking_id')->unsigned()->index('booking_id');
			$table->string('booking_type', 191)->nullable();
			$table->string('cancellation_policy', 191)->nullable();
			$table->string('booking_category', 191)->nullable();
			$table->string('booking_color', 191)->nullable();
			$table->string('signage', 191)->nullable();
			$table->string('customer_in_place', 191)->nullable();
			$table->string('contact_person_in_place', 191)->nullable();
			$table->string('event_name', 191)->nullable();
			$table->string('telephone_number', 191)->nullable();
			$table->string('email_address', 191)->nullable();
			$table->string('project_leader', 191)->nullable();
			$table->string('other_personal', 191)->nullable();
			$table->string('sales_person', 191)->nullable();
			$table->dateTime('project_time')->nullable();
			$table->string('project_cost', 191)->nullable();
			$table->dateTime('clearing_time')->nullable();
			$table->string('clearing_cost', 191)->nullable();
			$table->dateTime('writers_time')->nullable();
			$table->string('writers_cost', 191)->nullable();
			$table->dateTime('furnishing_time')->nullable();
			$table->string('furnishing_cost', 191)->nullable();
			$table->dateTime('first_person_time')->nullable();
			$table->string('first_person_text', 191)->nullable();
			$table->dateTime('guest_arrival_time')->nullable();
			$table->string('guest_arrival_text', 191)->nullable();
			$table->dateTime('morning_coffee_time')->nullable();
			$table->string('morning_coffee_text', 191)->nullable();
			$table->dateTime('meeting_start_time')->nullable();
			$table->string('meeting_start_text', 191)->nullable();
			$table->dateTime('lunch_time')->nullable();
			$table->string('lunch_text', 191)->nullable();
			$table->dateTime('afternoon_coffee_time')->nullable();
			$table->string('afternoon_coffee_text', 191)->nullable();
			$table->dateTime('meeting_end_time')->nullable();
			$table->string('meeting_end_text', 191)->nullable();
			$table->dateTime('dinner_time')->nullable();
			$table->string('dinner_text', 191)->nullable();
			$table->dateTime('party_time')->nullable();
			$table->string('party_text', 191)->nullable();
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
		Schema::drop('conference_booking_draft');
	}

}
