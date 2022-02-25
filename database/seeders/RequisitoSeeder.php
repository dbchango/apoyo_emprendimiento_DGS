<?php

namespace Database\Seeders;

use App\Models\Requisito;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisitos')->insert([
            [
                'nombre' => 'Croquis de negocio',
                'costo' => 23.50,
                'contenido' => 'Content',
                'detalles' => 'No details',
                'organizaciones_regulatorias_id' => 2
            ],
            [
                'nombre' => 'Impuesto 2',
                'costo' => 20.50,
                'contenido' => 'Content',
                'detalles' => 'No details',
                'organizaciones_regulatorias_id' => 2
            ]
        ]);
    }
}
