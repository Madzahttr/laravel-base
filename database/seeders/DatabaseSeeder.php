<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $testUser = User::create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('password'),
        ]);

        $user->markEmailAsVerified();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $testRole = Role::where('name', 'test')->first();

        $user->roles()->attach([$adminRole->id]);
        $user->roles()->attach([$userRole->id]);
        $user->roles()->attach([$testRole->id]);

        $testUser->roles()->attach([$userRole->id]);
        $testUser->roles()->attach([$testRole->id]);
    }
}
