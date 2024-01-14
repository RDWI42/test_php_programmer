<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pelatihan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelatihan')->insert([
            'user_id' => 1, // Sesuaikan dengan ID user yang sesuai
            'nama_kursus' => 'Pelatihan Laravel',
            'sertifikat' => true,
            'tahun' => '2022',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
