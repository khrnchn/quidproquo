<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Harishdurga\LaravelQuiz\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'name' => 'One morning, you have received a CIMB letter with QR code at your house, asking you to scan it. What should you do?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Is it true that the website virustotal.com is able to receive your report if you get scammed?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Is it true that the website virustotal.com is only able to check the URL either it is safe or not?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'While waiting in the lobby of your building for a guest, you notice a man in a red shirt standing close to a locked door with a large box in his hands. He waits for someone else to come along and open the locked door and then proceeds to follow her inside. What type of social engineering attack have you just witnessed?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'A colleague asks you for advice on why he cannnot log in to his Gmail account. Looking at his browser, you see he has typed www.gmal.com in the address bar. The screen looks very similar to the Gmail login screen. Your colleague has just fallen victim to what type of attack?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Coming into your office, you overhear a conversation between two security guards. One guard is telling the other she caught several people digging through the trash behind the building early this morning. The security guard says the people claimed to be looking for aluminum cans, but only had a bag of papers—no cans. What type of attack has this security guard witnessed?',
                'is_active' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'A senior executive report that she received a suspicious email pattern is sensitive internal project that is behind production email is sent from someone she does not know and he is asking for immediate clarification on several of the project details so the project can get back on schedule which type of attack best describes this scenario.',
                'is_active' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}
