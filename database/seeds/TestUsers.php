<?php

use Illuminate\Database\Seeder;

class TestUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
           array(
               ['id'=>'1',
                   'name'=>'Tanya',
            'email'=>'tanya@yandex.ru',
            'password'=>bcrypt('123123'),
            'about'=>'Упоротый переводчик.Люблю котят и покушать',
            'photo'=>'grey.jpg',
            'rating'=>5,
                   'grant'=>null,
                   'block'=>null,

                ],
               ['id'=>'2',
                   'name'=>'Admin',
            'email'=>'root@yandex.ru',
            'password'=>bcrypt('rootroot'),
                   'about'=>null,
                   'photo'=>'grey.jpg',
                   'rating'=>null,
                   'grant'=>1,
                   'block'=>null,
        ],
               ['id'=>'3',
                   'name'=>'Anya',
                   'email'=>'anya@yandex.ru',
                   'password'=>bcrypt('456456'),
                   'about'=>'Упоротый переводчик.Люблю котят и покушать',
                   'photo'=>'grey.jpg',
                   'rating'=>5,
                   'grant'=>null,
                   'block'=>null,
               ],
               ['id'=>'4',
                   'name'=>'Nastya',
                   'email'=>'nastya@yandex.ru',
                   'password'=>bcrypt('789789'),
                   'about'=>'Упоротый переводчик.Люблю котят и покушать',
                   'photo'=>'grey.jpg',
                   'rating'=>5,
                   'grant'=>null,
                   'block'=>null,
               ],
               ['id'=>'5',
                   'name'=>'Redactor',
                   'email'=>'red@yandex.ru',
                   'password'=>bcrypt('redred'),
                   'about'=>null,
                   'photo'=>'grey.jpg',
                   'rating'=>null,
                   'grant'=>2,
                   'block'=>null,
               ],
           )
    );
    }
}
