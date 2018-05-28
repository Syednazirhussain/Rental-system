<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('sort_index');
            $table->dropColumn('article_number');
            $table->dropColumn('public_name');
            $table->dropColumn('SQNA');
            $table->dropColumn('building_id');
            $table->dropColumn('address');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('end_date_continue');
            $table->dropColumn('conf_room_type');
            $table->dropColumn('conf_day_price');
            $table->dropColumn('conf_half_day_price');
            $table->dropColumn('conf_cost');
            $table->dropColumn('conf_small_group_price');
            $table->dropColumn('conf_high_price');
            $table->dropColumn('conf_medium_price');
            $table->dropColumn('conf_low_price');
            $table->dropColumn('conf_termination_cond');
            $table->dropColumn('conf_vat');
            $table->dropColumn('conf_calendar_available');
            $table->dropColumn('conf_available_users');
            $table->dropColumn('conf_info_internal');
            $table->dropColumn('conf_info_customer_se');
            $table->dropColumn('conf_info_customer_en');
            $table->dropColumn('conf_info_technical_se');
            $table->dropColumn('conf_info_technical_en');
            $table->dropColumn('rent_monthly_rent');
            $table->dropColumn('rent_num_persons');
            $table->dropColumn('rent_vat');
            $table->dropColumn('rent_new_price');
            $table->dropColumn('rent_start_date');
            $table->dropColumn('rent_end_date');
            $table->dropColumn('rent_end_date_continue');
            $table->dropColumn('rent_room_type');
            $table->dropColumn('rent_calendar_available');
            $table->dropColumn('rent_available_users');
        });
    }
}
