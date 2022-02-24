<?php

namespace Database\Seeders;

use App\Models\TipoDePersona;
use Illuminate\Database\Seeder;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDePersona::create([
            [
                'nombre' => 'Natural'
            ],
            [
                'nombre' => 'Juridica'
            ]
        ]);
    }
}
