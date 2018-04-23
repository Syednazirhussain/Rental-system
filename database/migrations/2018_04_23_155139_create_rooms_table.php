<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('floor_id')->unsigned()->index('rooms_floor_id_foreign');
			$table->integer('company_id')->unsigned()->index('rooms_company_id_foreign');
			$table->integer('service_id')->unsigned()->nullable()->index('service_id');
			$table->string('name', 191);
			$table->integer('area');
			$table->integer('price');
			$table->decimal('perday_price', 10)->unsigned()->nullable();
			$table->decimal('perhour_price', 10)->unsigned()->nullable();
			$table->string('security_code', 191);
			$table->string('image1', 191);
			$table->string('image2', 191);
			$table->string('image3', 191);
			$table->string('image4', 191);
			$table->string('image5', 191);
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
		Schema::drop('rooms');
	}

}
