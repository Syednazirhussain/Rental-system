<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191)->nullable();
			$table->decimal('price_per_attendee', 10)->nullable()->default(0.00);
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
		Schema::drop('conference_food');
	}

}
