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

        Biodata::updateOrCreate(
            ['nim' => '12.11.5866'],
            [
                'nama' => 'rizki eka prasodjo',
                'deskripsi' => '12.11.5866 merupakan master dari uts ini dengan tugas membuat front-end dan mengirimkannya ke grup',
                'foto' => 'rizki.jpg',
            ]
        );

        Biodata::updateOrCreate(
            ['nim' => '12.11.6018'],
            [
                'nama' => 'andi agus salim',
                'deskripsi' => 'dengan NIM 12.11.6018 merupakan pegawai dan mempunyai tugas mengerjakan back-end pada UTS ini',
                'foto' => 'andi.jpg',
            ]
        );
    }
}
