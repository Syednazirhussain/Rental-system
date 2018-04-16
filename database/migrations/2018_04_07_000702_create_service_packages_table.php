<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicePackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_packages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('packages_id')->nullable();
			$table->float('package_price', 10, 0)->nullable();
			$table->integer('services_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_packages');
	}

}