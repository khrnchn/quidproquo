<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Harishdurga\LaravelQuiz\Database\Seeders\QuestionTypeSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create one super admin account
        $superadmin = \App\Models\User::factory()
            ->count(1)
            ->create([
                'name' => 'Super Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
            ]);

        // create one user account
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'name' => 'User',
                'email' => 'user@test.com',
                'password' => Hash::make('password'),
            ]);

        // create dr firdaus's account
        $supervisor = \App\Models\User::factory()
            ->count(1)
            ->create([
                'name' => 'Dr. Firdaus',
                'email' => 'firdaus@test.com',
                'password' => Hash::make('password'),
            ]);

        Artisan::call('shield:install', ['--fresh' => true]);

        // here the permissions are still zero
        $superadmin->assignRole("filament_user");
        $permissions = $superadmin->getPermissionsViaRoles();
        $superadmin->givePermissionTo($permissions);

        $user->assignRole("filament_user");
        $permissions = $user->getPermissionsViaRoles();
        $user->givePermissionTo($permissions);

        $supervisor->assignRole("filament_user");
        $permissions = $supervisor->getPermissionsViaRoles();
        $supervisor->givePermissionTo($permissions);

        // $this->call(QuestionSeeder::class);
        // $this->call(TopicSeeder::class);
        // $this->call(QuestionTypeSeeder::class);
    }
}
