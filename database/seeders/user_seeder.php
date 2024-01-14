<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'no_ktp' => '1234567890123456',
            'password' => bcrypt('password123'),
            'tempat_lahir' => 'Jakarta',
            'tgllahir' => '10-12-1999',
            'jk' => 'Laki-laki',
            'agama' => 'Islam',
            'gd' => 'A',
            'alamat_ktp' => 'Jl. KTP No. 123',
            'alamat_tinggal' => 'Jl. Tinggal No. 456',
            'no_tlp' => '081234567890',
            'skill' => 'PHP, Laravel, HTML, CSS',
            'bersedia_diluar_kota' => true,
            'gaji' => '5000000',
            'posisi' => 'Programmer',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'level' => 'admin'
        ]);

        // Seeder untuk user dengan level 'user'
        DB::table('users')->insert([
            'nama' => 'Jane Doe',
            'email' => 'jane@example.com',
            'no_ktp' => '9876543210987654',
            'password' => bcrypt('password456'),
            'tempat_lahir' => 'Bandung',
            'tgllahir' => '2000-05-20',
            'jk' => 'Perempuan',
            'agama' => 'Kristen',
            'gd' => 'B',
            'alamat_ktp' => 'Jl. KTP No. 456',
            'alamat_tinggal' => 'Jl. Tinggal No. 789',
            'no_tlp' => '087654321098',
            'skill' => 'JavaScript, React, Node.js',
            'bersedia_diluar_kota' => false,
            'gaji' => '4500000',
            'posisi' => 'Developer',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'level' => 'user'
        ]);
    }
}
