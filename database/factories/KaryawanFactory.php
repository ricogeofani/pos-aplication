<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male' => 'L', 'female' => 'P']);
        $jabatan = $this->faker->randomElement(['kasir', 'manager', 'admin', 'gudang', 'pramuniaga']);
        return [
            'nama_karyawan' => $this->faker->name(),
            'sex'       => $gender,
            'email'     => $this->faker->email(),
            'telp'      => $this->faker->phoneNumber(),
            'alamat'    => $this->faker->address(),
            'jabatan'       => $jabatan,
        ];
    }
}
