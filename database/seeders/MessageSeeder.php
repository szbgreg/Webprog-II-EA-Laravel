<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::create([
            'sender_name' => 'Kovács Márton',
            'sender_email' => 'kmarton@example.hu',
            'content' => 'Üdvözlöm! Szeretnék érdeklődni, hogy van-e lehetőség sütemény rendelni Önöktől esküvőre? Válaszát előre is köszönöm. Kovács Márton',
        ]);

        Message::create([
            'sender_name' => 'Lelkes Vivien',
            'sender_email' => 'lvivien@example.hu',
            'content' => 'Hello! Csak szeretném jelezni, hogy a sütemények nagyon finomak voltak. Mindennel elégedettek voltunk. Nagyon köszönjük. Vivien',
        ]);
    }
}
