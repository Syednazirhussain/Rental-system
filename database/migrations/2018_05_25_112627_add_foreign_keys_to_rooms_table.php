<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::table('rooms', function(Blueprint $table)
		{
			$table->foreign('company_id')->references('id')->on('companies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('floor_id')->references('id')->on('company_floor_rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('building_id', 'rooms_ibfk_1')->references('id')->on('company_buildings')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('service_id')->references('id')->on('services')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/*Schema::table('rooms', function(Blueprint $table)
		{
			$table->dropForeign('rooms_company_id_foreign');
			$table->dropForeign('rooms_floor_id_foreign');
			$table->dropForeign('rooms_ibfk_1');
			$table->dropForeign('rooms_service_id_foreign');
		});*/
	}

}
