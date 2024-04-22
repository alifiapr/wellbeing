<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Praktik;
use App\Models\Psikolog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = Psikolog::create([
            'name' => 'Marshela',
            'degree' => 'M.Psi.',
            'session' => 22,
            'experience' => 2,
            'status' => 1,
            'photo' => 'marshela.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Marshela',
                'email' => 'marshela@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
            [
                'psikolog_id' => $a->id,
                'hari' => 'senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $a->id,
                'hari' => 'selasa',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $a->id,
                'hari' => 'rabu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

        $b = Psikolog::create([
            'name' => 'Ghanny',
            'degree' => 'M.Psi.',
            'session' => 30,
            'experience' => 3,
            'status' => 0,
            'photo' => 'ghanny.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Ghanny',
                'email' => 'ghanny@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
            
            [
                'psikolog_id' => $b->id,
                'hari' => 'kamis',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $b->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

        $c = Psikolog::create([
            'name' => 'Kirana',
            'degree' => 'M.Psi.',
            'session' => 42,
            'experience' => 4,
            'status' => 1,
            'photo' => 'kirana.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Kirana',
                'email' => 'kirana@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
            [
                'psikolog_id' => $c->id,
                'hari' => 'senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $c->id,
                'hari' => 'rabu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $c->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

        $d = Psikolog::create([
            'name' => 'Kevin',
            'degree' => 'M.Psi.',
            'session' => 45,
            'experience' => 2,
            'status' => 0,
            'photo' => 'kevin.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Kevin',
                'email' => 'kevin@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
           
            [
                'psikolog_id' => $d->id,
                'hari' => 'kamis',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $d->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

        $e = Psikolog::create([
            'name' => 'Fakhri',
            'degree' => 'M.Psi.',
            'session' => 25,
            'experience' => 3,
            'status' => 1,
            'photo' => 'fakhri.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Fakhri',
                'email' => 'fakhri@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
            [
                'psikolog_id' => $e->id,
                'hari' => 'senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
           
            [
                'psikolog_id' => $e->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

        $f = Psikolog::create([
            'name' => 'Bella',
            'degree' => 'M.Psi.',
            'session' => 50,
            'experience' => 3,
            'status' => 1,
            'photo' => 'bella.png',
            'location' => 'Jl. Raya Bogor, No. 12, Jakarta',
            'user_id' => User::factory()->create([
                'name' => 'Bella',
                'email' => 'bella@gmail.com'
            ])->assignRole('psikolog')->id,
        ]);

        Praktik::insert([
            [
                'psikolog_id' => $f->id,
                'hari' => 'senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $f->id,
                'hari' => 'selasa',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'psikolog_id' => $f->id,
                'hari' => 'jumat',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
        ]);

    }
}
