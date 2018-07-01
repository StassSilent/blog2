<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(
            array(
                [
                    'dialog'=>'1',
                    'message'=>'i am sexy and i am know it',
                    'id_from'=>'1',
                    'id_to'=>'2',

                ],
                [
                    'dialog'=>'1',
                    'message'=>'lalalalalalala',
                    'id_from'=>'1',
                    'id_to'=>'2',

                ],
                [
                    'dialog'=>'3',
                    'message'=>'tuc tuc',
                    'id_from'=>'1',
                    'id_to'=>'2',

                ],
                [
                    'dialog'=>'3',
                    'message'=>'tuc tuc',
                    'id_from'=>'1',
                    'id_to'=>'2',

                ],
            )
        );

    }
}
