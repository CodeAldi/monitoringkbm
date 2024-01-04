<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('iniadmin123'),
            'role' => UserRole::Admin,
        ]);
        \App\Models\User::create([
            'name' => 'Wakil Kurikulum',
            'email' => 'wakur@test.com',
            'password' => bcrypt('iniwakur123'),
            'role' => UserRole::WakilKurikulum,
        ]);
    }
}
