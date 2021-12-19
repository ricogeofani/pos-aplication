<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Pelanggan::factory(10)->create();
        \App\Models\Kategory::factory(7)->create();
        \App\Models\Karyawan::factory(10)->create();
        \App\Models\Suplier::factory(10)->create();
        \App\Models\Barang::factory(20)->create();
    }
}
