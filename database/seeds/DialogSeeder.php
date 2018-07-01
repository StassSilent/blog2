<?php

use Illuminate\Database\Seeder;

class DialogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dialogs')->insert(
            array(
                [
                    'id_1'=>'2',
                    'id_2'=>'4',

                ],
                [
                    'id_1'=>'2',
                    'id_2'=>'3',

                ],
                [
                    'id_1'=>'2',
                    'id_2'=>'3',
                ],
            )
        );
    }
}
