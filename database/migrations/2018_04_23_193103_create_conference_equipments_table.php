<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConferenceEquipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_equipments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191)->nullable();
			$table->decimal('price', 10)->nullable()->default(0.00);
			$table->integer('criteria_id')->unsigned()->nullable()->index('criteria');
			$table->boolean('is_multi_units')->nullable();
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
		Schema::drop('conference_equipments');
	}

}
