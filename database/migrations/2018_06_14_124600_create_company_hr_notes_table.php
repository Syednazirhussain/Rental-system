<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyHrNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_hr_notes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('company_hr_id')->unsigned()->nullable()->index('company_hr_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->string('code', 191)->nullable();
			$table->text('note')->nullable();
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
		Schema::drop('company_hr_notes');
	}

}
