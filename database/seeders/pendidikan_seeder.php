<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pendidikan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendidikan')->insert([
            'user_id' => 1,
            'jenjang' => 'S1',
            'institusi' => 'Universitas Contoh',
            'jurusan' => 'Teknik Informatika',
            'tahun_lulus' => '2020',
            'ipk' => '3.5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
