<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomEquipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_equipments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned()->nullable()->index('room_id');
			$table->string('room_type', 191)->nullable();
			$table->integer('equipment_id')->unsigned()->nullable()->index('equipment_id');
			$table->integer('qty')->unsigned()->nullable();
			$table->decimal('price', 10)->unsigned()->nullable();
			$table->text('info', 65535)->nullable();
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
		Schema::drop('room_equipments');
	}

}
