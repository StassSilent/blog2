<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert(
        	array(
				[
					'language' =>"Японский"
				],
				[
					'language' =>"Турецкий"
				],
				[
					'language' =>"Испанский"
				],
				[
					'language' =>"Французский"
				]
			)
        );
    }
}
