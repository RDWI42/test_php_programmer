<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pekerjaan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerjaan')->insert([
            'user_id' => 1,
            'nama_perusahaan' => 'Contoh Company',
            'posisi' => 'Software Engineer',
            'pendapatan' => '10000000',
            'tahun' => '2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
