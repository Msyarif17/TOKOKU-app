<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Supplyer;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i<=10;$i++){
            Kategori::create([
                'nama'=>$faker->name(),
                'kode' =>Str::random(2)
            ]);
        }
        for($i = 1; $i<=10;$i++){
            Supplyer::create([
                'nama'=>$faker->name(),
                'alamat'=>$faker->address,
                'nomor_telepon' => random_int(100000000000, 999999999999)
            ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
