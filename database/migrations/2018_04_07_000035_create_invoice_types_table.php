<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_types', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('monthly', 1)->nullable();
			$table->boolean('quaterly', 1)->nullable();
			$table->boolean('6month', 1)->nullable();
			$table->boolean('yearly', 1)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoice_types');
	}

}