<?php

namespace Database\Seeders;

use App\Models\Suti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/source/suti.txt');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sort kivesszük mert az csak fejléc
        array_shift($lines);

        foreach ($lines as $line) {
            [$id, $nev, $tipus, $dijazott] = explode("\t", trim($line));

            Suti::create([
                'id' => (int)$id,
                'nev' => $nev,
                'tipus' => $tipus,
                'dijazott' => (bool)$dijazott,
            ]);
        }
    }
}
