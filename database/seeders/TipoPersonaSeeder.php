<?php

namespace Database\Seeders;

use App\Models\TipoDePersona;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_de_persona')->insert([
            [
                'nombre' => 'Natural'
            ],
            [
                'nombre' => 'Juridica'
            ]
        ]);
    }
}
