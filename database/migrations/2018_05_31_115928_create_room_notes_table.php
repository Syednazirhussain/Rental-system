<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_notes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned()->nullable()->index('room_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
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
		Schema::drop('room_notes');
	}

}
