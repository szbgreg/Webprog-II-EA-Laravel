<?php

namespace Database\Seeders;

use App\Models\Ar;
use Illuminate\Database\Seeder;

class ArSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/source/ar.txt');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sort kivesszük mert az csak fejléc
        array_shift($lines);

        foreach ($lines as $line) {
            [$id, $sutiid, $ertek, $egyseg] = explode("\t", trim($line));

            Ar::create([
                'id' => (int) $id,
                'sutiid' => (int) $sutiid,
                'ertek' => (int) $ertek,
                'egyseg' => $egyseg,
            ]);
        }
    }
}
