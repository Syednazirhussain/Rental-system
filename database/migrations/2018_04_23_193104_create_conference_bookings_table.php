<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_bookings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_customer_id')->unsigned()->index('company_customer_id');
			$table->date('booking_date')->nullable();
			$table->dateTime('start_datetime')->nullable();
			$table->dateTime('end_datetime')->nullable();
			$table->integer('attendees')->unsigned()->nullable();
			$table->integer('room_id')->unsigned()->nullable()->index('room_id');
			$table->integer('room_layout_id')->unsigned()->nullable()->index('room_layout_id');
			$table->string('duration_code', 50)->nullable()->index('duration_code');
			$table->string('booking_status', 50)->default('pending');
			$table->string('payment_method_code', 50)->nullable()->index('payment_method_code');
			$table->decimal('room_price', 10)->unsigned()->default(0.00);
			$table->decimal('equipment_price', 10)->unsigned()->default(0.00);
			$table->decimal('food_price', 10)->unsigned()->default(0.00);
			$table->decimal('tax', 10)->unsigned()->default(0.00);
			$table->decimal('total_price', 10)->unsigned()->default(0.00);
			$table->decimal('deposit', 10)->unsigned()->default(0.00);
			$table->text('remarks', 65535);
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
		Schema::drop('conference_bookings');
	}

}
