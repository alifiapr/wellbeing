<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Amanda Minerva',
            'email' => 'admin@gmail.com',
        ])->assignRole(['client', 'admin']);

        $this->call(PsikologSeeder::class);

        $this->call(KonselingSeeder::class);
    }
}
