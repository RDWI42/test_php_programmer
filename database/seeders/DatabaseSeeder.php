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
        $this->call(user_seeder::class);
        $this->call(pekerjaan_seeder::class);
        $this->call(pelatihan_seeder::class);
        $this->call(pendidikan_seeder::class);
    }
}
