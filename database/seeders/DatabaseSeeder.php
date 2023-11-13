<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'rol' => 'admin'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'becario@gmail.com',
            'password' => '12345678',
            'rol' => 'becario'
        ]);

        \App\Models\User::factory()->create([
            'email' => 'cliente@gmail.com',
            'password' => '12345678',
            'rol' => 'cliente'
        ]);
    }
}
