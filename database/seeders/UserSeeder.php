<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmad Hisyam',
                'email' => 'hisyam@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-06-30 23:12:41',
            ],
            [
                'name' => 'Muhammad Rahimi',
                'email' => 'rahimi@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-08-30 23:12:41',
            ],
            [
                'name' => 'Shamim Adham',
                'email' => 'shamim@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-09-30 23:12:41',
            ],
            [
                'name' => 'Akrimi Mathwa',
                'email' => 'akrimi@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-10-30 23:12:41',
            ],
            [
                'name' => 'Muhammad Izzat',
                'email' => 'izzat@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-11-30 23:12:41',
            ],
            [
                'name' => 'Isa Ishaq',
                'email' => 'isa@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2022-12-30 23:12:41',
            ],
            [
                'name' => 'Nik Farihin',
                'email' => 'farihin@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2023-01-30 23:12:41',
            ],
            [
                'name' => 'Izzat Haiqal',
                'email' => 'ijat@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2023-01-30 23:12:41',
            ],
            [
                'name' => 'Khairon Chan',
                'email' => 'khairon@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => '2023-01-30 23:12:41',
            ],
            [
                'name' => 'Khairina Chan',
                'email' => 'khairina@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
