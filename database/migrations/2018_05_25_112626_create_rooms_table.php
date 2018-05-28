<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('floor_id')->unsigned()->nullable()->index('floor_id');
			$table->integer('company_id')->unsigned()->nullable()->index('company_id');
			$table->integer('service_id')->unsigned()->nullable()->index('service_id');
			$table->string('name', 191);
			$table->integer('area');
			$table->integer('price');
			$table->string('security_code', 191);
			$table->string('image1', 191);
			$table->string('image2', 191);
			$table->string('image3', 191);
			$table->string('image4', 191);
			$table->string('image5', 191);
			$table->integer('sort_index')->unsigned()->nullable();
			$table->string('article_number', 191)->nullable();
			$table->string('public_name', 191)->nullable();
			$table->string('SQNA', 191)->nullable();
			$table->integer('building_id')->unsigned()->nullable()->index('building_id');
			$table->string('address', 191)->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->boolean('end_date_continue')->nullable();
			$table->string('conf_room_type', 191)->nullable();
			$table->decimal('conf_day_price', 10, 0)->nullable();
			$table->decimal('conf_half_day_price', 10, 0)->nullable();
			$table->decimal('conf_cost', 10, 0)->nullable();
			$table->decimal('conf_small_group_price', 10, 0)->nullable();
			$table->decimal('conf_high_price', 10, 0)->nullable();
			$table->decimal('conf_medium_price', 10, 0)->nullable();
			$table->decimal('conf_low_price', 10, 0)->nullable();
			$table->text('conf_termination_cond', 65535)->nullable();
			$table->decimal('conf_vat', 10, 0)->nullable();
			$table->boolean('conf_calendar_available')->nullable();
			$table->boolean('conf_available_users')->nullable();
			$table->text('conf_info_internal')->nullable();
			$table->text('conf_info_customer_se')->nullable();
			$table->text('conf_info_customer_en')->nullable();
			$table->text('conf_info_technical_se')->nullable();
			$table->text('conf_info_technical_en')->nullable();
			$table->decimal('rent_monthly_rent', 10, 0)->nullable();
			$table->integer('rent_num_persons')->nullable();
			$table->decimal('rent_vat', 10, 0)->nullable();
			$table->decimal('rent_new_price', 10, 0)->nullable();
			$table->date('rent_start_date')->nullable();
			$table->date('rent_end_date')->nullable();
			$table->boolean('rent_end_date_continue')->nullable();
			$table->string('rent_room_type', 191)->nullable();
			$table->boolean('rent_calendar_available')->nullable();
			$table->boolean('rent_available_users')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});*/
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rooms');
	}

}
