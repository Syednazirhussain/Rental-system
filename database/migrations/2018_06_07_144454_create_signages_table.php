<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('fourth_name');
            $table->string('screen_name_1')->nullable();
            $table->string('screen_name_2')->nullable();
            $table->string('screen_name_3')->nullable();
            $table->string('screen_name_4')->nullable();
            $table->string('logo_1')->nullable();
            $table->string('logo_2')->nullable();
            $table->string('logo_3')->nullable();
            $table->string('logo_4')->nullable();

            $table->integer('customer_id')->unsigned()->index('customer_id');
            $table->integer('company_id')->unsigned()->index('company_id');

            $table->foreign('customer_id')->references('id')->on('company_customers');
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('signages');

        Schema::table('signages', function (Blueprint $table) {
            $table->dropForeign('signages_company_id_foreign');
            $table->dropForeign('signages_customer_id_foreign');
        });
    }
}
