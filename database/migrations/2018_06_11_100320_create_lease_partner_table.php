<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeasePartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lease_partner', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('parent_company', 191)->nullable();
			$table->string('sister_company', 191)->nullable();
			$table->string('sales_person', 191)->nullable();
			$table->integer('delegated')->nullable();
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
		Schema::drop('lease_partner');
	}

}
