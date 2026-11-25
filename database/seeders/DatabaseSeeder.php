<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Biodata::updateOrCreate(
            ['nim' => '24010110188'],
            [
                'nama' => 'Bagus Dwi Syahputra',
                'deskripsi' => 'backend',
                'foto' => '1795597259_pi7-tool-bagus-dwi-syahputra.jpg',
            ]
        );

        
    }
}
