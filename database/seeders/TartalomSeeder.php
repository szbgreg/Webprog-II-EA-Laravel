<?php

namespace Database\Seeders;

use App\Models\Tartalom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TartalomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/source/tartalom.txt');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sort kivesszük mert az csak fejléc
        array_shift($lines);

        foreach ($lines as $line) {
            [$id, $sutiid, $mentes] = explode("\t", trim($line));

            Tartalom::create([
                'id' => (int)$id,
                'sutiid' => (int)$sutiid,
                'mentes' => $mentes,
            ]);
        }
    }
}
