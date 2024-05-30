<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create('id_ID');

        Layanan::create([
            'title'=>'Cloud Web Hosting',
            'body'=>$faker->text,
        ]);

        Layanan::create([
            'title'=>'Virtual Private Server',
            'body'=>$faker->text,
        ]);

        Layanan::create([
            'title'=>'Cloud Storage',
            'body'=>$faker->text,
        ]);

        Layanan::create([
            'title'=>'Add On Domain',
            'body'=>$faker->text,
        ]);
    }
}
