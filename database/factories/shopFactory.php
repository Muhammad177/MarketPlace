<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shop>
 */
class shopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3),
            'nama_barang' => $this->faker->words(2, true), 
            'jumlah_barang' => $this->faker->numberBetween(1, 100),
            'harga_barang' => $this->faker->numberBetween(10000, 1000000),
            'deskripsi_barang' => $this->faker->sentence(100),
            'code_barang' => strtoupper($this->faker->unique()->bothify('???###')),
        ];
    }
}
