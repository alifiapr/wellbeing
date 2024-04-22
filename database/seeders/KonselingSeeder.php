<?php

namespace Database\Seeders;

use App\Models\Konseling;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //get one user with role psikolog
        $psikolog = User::role('psikolog')->first();

        //get client
        $client = User::role('client')->first();

        //create konseling
        Konseling::create([
            'psikolog_id' => $psikolog->id,
            'client_id' => $client->id,
            'phone' => '62839394723',
            'gender' => 2,
            'address' => 'Jl. Raya Bogor',
            'category' => 1,
            'description' => 'Konseling untuk mengatasi masalah pencernaan', 
            'note' => ''
        ]);
        Konseling::create([
            'psikolog_id' => $psikolog->id + 1,
            'client_id' => $client->id,
            'phone' => '62839394723',
            'gender' => 1,
            'address' => 'Jl. Raya Bogor',
            'category' => 2,
            'date' => '2021-01-21',
            'time' => '10:00:00',
            'description' => 'Konseling untuk menghalangi kebiasaan buruk', 
            'note' => ''
        ]);
    }
}
