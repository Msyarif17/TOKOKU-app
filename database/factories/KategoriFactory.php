<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kategori::class;
    public function definition()
    {
        return [
            'nama'=>$this->faker->name(),
            'kode' =>Str::random(2)
        ];
    }
}
