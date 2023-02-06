<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Bioskop;
use \App\Models\Film;
use \App\Models\Ocena;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //brisanje
        User::truncate();
        Bioskop::truncate();
        Film::truncate();
        Ocena::truncate();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)->create();
        Bioskop::factory(10)->create();


        $user = User::create([
            'name' => 'Jovana',
            'email' => 'jovanalazarevic394@gmail.com',
            'password' => Hash::make('Jovana.2000'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        $film1 = Film::create([
            'name' => 'Avatar'
        ]);

        $film2 = Film::create([
            'name' => 'Oluja'
        ]);

        $film3 = Film::create([
            'name' => 'Čovek po imenu Oto'
        ]);

        $film4 = Film::create([
            'name' => 'Alkaras'
        ]);

        $film5 = Film::create([
            'name' => 'Opasan let'
        ]);

        $ocena1 = Ocena::create([
            'datum_i_vreme' => now(),
            'korisnik' => 2,
            'film' => 1,
            'bioskop' => 1,
            'ocena' => 5,
            'poruka' => 'Avanturističan, odlična gluma.'
        ]);

        $ocena2 = Ocena::create([
            'datum_i_vreme' => now(),
            'korisnik' => 3,
            'film' => 2,
            'bioskop' => 2,
            'ocena' => 5,
            'poruka' => 'Odlična gluma, prijatno'
        ]);
    }
}