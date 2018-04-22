<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyFloorRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_floor_rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('building_id')->unsigned()->nullable()->index('building_id');
			$table->integer('company_id')->unsigned()->index('company_id');
			$table->string('floor', 100)->nullable();
			$table->integer('num_rooms')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_floor_rooms');
	}

}
