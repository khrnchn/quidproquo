<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'name' => 'Quid Pro Quo',
                'slug' => 'quid-pro-quo',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Phishing',
                'slug' => 'phishing',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Tailgating',
                'slug' => 'tailgating',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Eavesdropping',
                'slug' => 'eavesdropping',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'PhiVisp',
                'slug' => 'phivisp',
                'is_active' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('topics')->insert($topics);
    }
}
