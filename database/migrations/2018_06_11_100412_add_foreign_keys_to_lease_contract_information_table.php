<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLeaseContractInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lease_contract_information', function(Blueprint $table)
		{
			$table->foreign('lease_partner_id', 'lease_contract_information_ibfk_1')->references('id')->on('lease_partner')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('building_id', 'lease_contract_information_ibfk_2')->references('id')->on('company_buildings')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('lease_attachment_id', 'lease_contract_information_ibfk_3')->references('id')->on('lease_attachment')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('currency_id', 'lease_contract_information_ibfk_4')->references('id')->on('currency')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lease_contract_information', function(Blueprint $table)
		{
			$table->dropForeign('lease_contract_information_ibfk_1');
			$table->dropForeign('lease_contract_information_ibfk_2');
			$table->dropForeign('lease_contract_information_ibfk_3');
			$table->dropForeign('lease_contract_information_ibfk_4');
		});
	}

}
