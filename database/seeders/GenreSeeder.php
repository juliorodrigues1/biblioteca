<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Ficção',
            'Romance',
            'Fantasia',
            'Terror',
            'Aventura',
        ];

        foreach ($genres as $genre) {
            \App\Models\Genre::create([
                'nome' => $genre,
            ]);
        }
    }
}
