<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomSittingArrangementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_sitting_arrangements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned()->nullable()->index('room_id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->integer('building_id')->unsigned()->nullable()->index('building_id');
			$table->string('name', 191)->nullable();
			$table->integer('number_persons')->nullable();
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
		Schema::drop('room_sitting_arrangements');
	}

}
