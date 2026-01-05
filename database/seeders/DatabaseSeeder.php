<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'      => 'Anisah',
            'nik'       => '6371045107790009',
            'password'  => Hash::make('admin123'),
            'jabatan'   => 'Admin',
            
        ]);

        User::create([
            'nama'      => 'Fitri',
            'nik'       => '6371054407830005',
            'password'  => Hash::make('cetak123'),
            'jabatan'   => 'Operator-Cetak',
            
        ]);

        User::create([
            'nama'      => 'Mitha',
            'nik'       => '6371014303000017',
            'password'  => Hash::make('rekam123'),
            'jabatan'      => 'Operator-Rekam',            
        ]);
    }
}
