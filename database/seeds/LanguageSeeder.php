<?php

use Illuminate\Database\Seeder;
use \Waavi\Translation\Repositories\LanguageRepository;


class LanguageSeeder extends Seeder
{
    // see https://github.com/Waavi/translation/issues/85
    public function run()
    {
        $languageRepository = \App::make(LanguageRepository::class);
        $languageRepository->create(['name'=>'English','locale'=>'en']);
        // $languageRepository->create(['name'=>'Swedish','locale'=>'sv']);
    }
}
