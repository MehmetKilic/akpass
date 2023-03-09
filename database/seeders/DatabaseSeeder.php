<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // AkPass example user

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$iKnNSbuKaE42C1ERuhFideJcSjzHs1oazbNWt1Bwh1CXIk4gwufe6', // password = 01020304
            'remember_token' => Str::random(22),
        ]);
    }
}
