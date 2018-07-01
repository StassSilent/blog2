<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert(
        	array(
				[
					'category' =>"Книга"
				],
				[
					'category' =>"Видео"
				],
				[
					'category' =>"Статья"
				],
				[
					'category' =>"Озвучка видео"
				]
			)
        );
    }
}
