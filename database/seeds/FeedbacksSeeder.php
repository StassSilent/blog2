<?php

use Illuminate\Database\Seeder;

class FeedbacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert(
            array(
                ['application'=>'3',
                    'user'=>'1',
                    'status_user'=>1,

                ],
            )
        );
    }
}
