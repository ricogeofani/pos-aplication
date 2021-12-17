<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pelanggan' => $this->faker->name(),
            'email'     => $this->faker->email(),
            'telp'      => $this->faker->phoneNumber(),
            'alamat'    => $this->faker->address(),
        ];
    }
}
