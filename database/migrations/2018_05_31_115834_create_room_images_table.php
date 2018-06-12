<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_images', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('room_id')->unsigned()->nullable()->index('room_id');
			$table->integer('sitting_id')->unsigned()->nullable()->index('sitting_id');
			$table->string('entity_type', 191)->nullable();
			$table->string('image_file', 191)->nullable();
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
		Schema::drop('room_images');
	}

}
