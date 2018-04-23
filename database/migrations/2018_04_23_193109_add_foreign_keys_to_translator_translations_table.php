<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTranslatorTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('translator_translations', function(Blueprint $table)
		{
			$table->foreign('locale')->references('locale')->on('translator_languages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('translator_translations', function(Blueprint $table)
		{
			$table->dropForeign('translator_translations_locale_foreign');
		});
	}

}
