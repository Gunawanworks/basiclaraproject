<?php

namespace Database\Seeders;


use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres=collect([
            'Heavy Metal',
            'Speed Metal',
            'Thrash Metal',
            'Power Metal',
            'Death Metal',
            'Black Metal',
            'Pagan Metal',
            'Viking Metal',
            'Folk Metal',
            'Symphonic Metal',
            'Gothic Metal',
            'Glam Metal',
            'Hair Metal',
            'Doom Metal',
            'Groove Metal'
        ]);

        $genres->each(function($genre){
            Genre::create([
                'name'=>$genre,
                'slug'=>Str::slug($genre),
            ]);
        });
    }
}
