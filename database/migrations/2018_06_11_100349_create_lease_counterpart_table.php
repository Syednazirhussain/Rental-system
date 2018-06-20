<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaseCounterpartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lease_counterpart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('organization_number')->unsigned()->nullable();
			$table->string('company_name', 191)->nullable();
			$table->string('contract_person', 191)->nullable();
			$table->string('tel', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->integer('lease_partner_id')->unsigned()->nullable()->index('lease_partner_id');
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
		Schema::drop('lease_counterpart');
	}

}
