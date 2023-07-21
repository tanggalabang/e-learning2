<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kelas::create([
            'kode_kelas' => "1001",
            'kelas_pendek' => "X RPL A",
            'kelas_panjang' => "X Rekayasa Perangkat Lunak A",
        ]);
        Kelas::create([
            'kode_kelas' => "1002",
            'kelas_pendek' => "X TKJ A",
            'kelas_panjang' => "X Teknik Komputer dan Jaringan A",
        ]);
    }
}
