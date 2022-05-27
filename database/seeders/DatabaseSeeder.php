<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Supplyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kategori::factory(10)->create();
        Supplyer::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
