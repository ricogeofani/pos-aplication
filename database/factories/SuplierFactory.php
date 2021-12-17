<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_suplier' => $this->faker->word(),
            'telp'      => $this->faker->phoneNumber(),
            'alamat'    => $this->faker->address(),
        ];
    }
}
