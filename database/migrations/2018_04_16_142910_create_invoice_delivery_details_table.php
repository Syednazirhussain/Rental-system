<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceDeliveryDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_delivery_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('companies_id')->nullable();
			$table->integer('clients_id')->nullable();
			$table->integer('invoice_delivery_details_id')->nullable();
			$table->string('invoice_note', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_delivery_details');
	}

}
