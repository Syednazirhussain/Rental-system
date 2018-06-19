<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_customer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');

			$table->string('address', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('postal_code', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('telephone', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('mobile', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('fax', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('organization_num', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('invoice_send_as', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('reference', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('contact_person', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('payment_condition', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('interest_fees', 191)->nullable()->collation('utf8_unicode_ci');
			$table->string('peyment_reminder', 191)->nullable()->collation('utf8_unicode_ci');
			$table->integer('country_id')->unsigned()->nullable()->index('country_id');
			$table->integer('state_id')->unsigned()->nullable()->index('state_id');
			$table->integer('city_id')->unsigned()->nullable()->index('city_id');		
				
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
		Schema::drop('company_customer');
	}

}
