<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyFloorRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_floor_rooms', function(Blueprint $table)
		{
			$table->foreign('company_id', 'company_floor_rooms_ibfk_1')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('building_id', 'company_floor_rooms_ibfk_2')->references('id')->on('company_buildings')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_floor_rooms', function(Blueprint $table)
		{
			$table->dropForeign('company_floor_rooms_ibfk_1');
			$table->dropForeign('company_floor_rooms_ibfk_2');
		});
	}

}
