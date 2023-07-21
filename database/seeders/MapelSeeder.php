<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Mapel::create([
            'nama' => "Informatika",
        ]);
        Mapel::create([
            'nama' => "Matematika",
        ]);

}
}
