<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestUsers::class);
        $this->call(CategorySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CategoryPagesSeeder::class);
        $this->call(DialogSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
