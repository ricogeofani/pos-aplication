<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $unit = $this->faker->randomElement(['pcs', 'karton']);
        return [
            'kode'        => rand(11111111, 99999999),
            'nama_barang' => $this->faker->word(),
            'unit'        => $unit,
            'harga_beli'  => rand(999, 9999),
            'harga_jual'  => rand(10000, 99999),
            'qty_stok'    => rand(10, 500),
            'id_kategory' => rand(1, 5),
            'id_suplier'  => rand(1, 10),
        ];
    }
}
