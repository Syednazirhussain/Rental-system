<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomLayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_layouts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned()->index('room_id');
			$table->integer('room_layout_id')->unsigned()->index('room_layout_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_layouts');
	}

}
