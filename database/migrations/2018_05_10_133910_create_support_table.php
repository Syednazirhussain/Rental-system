<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('subject', 191)->nullable();
			$table->text('content')->nullable();
			$table->text('html')->nullable();
			$table->integer('status_id')->unsigned()->nullable()->index('status_id');
			$table->integer('priority_id')->unsigned()->nullable()->index('priority_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->integer('category_id')->unsigned()->nullable()->index('category_id');
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
		Schema::drop('support');
	}

}