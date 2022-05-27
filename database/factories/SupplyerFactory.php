<?php

namespace Database\Factories;

use App\Models\Supplyer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplyer>
 */
class SupplyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Supplyer::class;
    public function definition()
    {
        return [
            'nama'=>$this->faker->name(),
            'alamat'=>$this->faker->address,
            'nomor_telepon' => random_int(100000000000, 999999999999)
        ];
    }
}
