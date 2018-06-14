<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaseContractInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lease_contract_information', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('contract_start_date')->nullable();
			$table->integer('contract_length')->unsigned()->nullable();
			$table->integer('termination_time')->unsigned()->nullable();
			$table->boolean('contract_auto_renewal')->nullable();
			$table->string('contract_renewal', 191)->nullable();
			$table->integer('renewal_number_month')->unsigned()->nullable();
			$table->string('contract_type', 191)->nullable();
			$table->string('contract_number', 191)->nullable();
			$table->string('contract_name', 191)->nullable();
			$table->text('contract_desc')->nullable();
			$table->decimal('amount_per_month', 10)->nullable();
			$table->decimal('income_per_month', 10)->nullable();
			$table->integer('currency_id')->unsigned()->nullable()->index('currency_id');
			$table->string('cost_reference', 191)->nullable();
			$table->string('income_reference', 191)->nullable();
			$table->string('other_reference', 191)->nullable();
			$table->integer('lease_attachment_id')->unsigned()->nullable()->index('lease_attachment_id');
			$table->integer('building_id')->unsigned()->nullable()->index('building_id');
			$table->integer('cost_number')->unsigned()->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('lease_partner_id')->unsigned()->nullable()->index('lease_partner_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lease_contract_information');
	}

}
