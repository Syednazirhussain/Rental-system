<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking_agency', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->string('name', 191)->nullable();
			$table->string('contact_person', 191)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('email', 191)->nullable();
			$table->string('mobile', 20)->nullable();
			$table->string('fax', 20)->nullable();
			$table->string('kick_back_fnb', 191)->nullable();
			$table->string('kick_back_room', 191)->nullable();
			$table->text('buildings', 65535)->nullable();
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
		Schema::drop('booking_agency');
	}

}
