<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanySupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_support', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('subject', 191)->nullable();
			$table->text('content', 65535)->nullable();
			$table->text('html', 65535)->nullable();
			$table->integer('status_id')->unsigned()->nullable()->index('status_id');
			$table->integer('priority_id')->unsigned()->nullable()->index('priority_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->integer('category_id')->unsigned()->nullable()->index('category_id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
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
		Schema::drop('company_support');
	}

}
