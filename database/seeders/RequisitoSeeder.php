<?php

namespace Database\Seeders;

use App\Models\Requisito;
use Illuminate\Database\Seeder;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requisito::create([
            [
                'nombre' => 'Croquis de negocio',
                'costo' => 23.50,
                'contenido' => 'Content',
                'detalles' => 'No details',
                'organizaciones_regulatorias_id' => 1
            ],
            [
                'nombre' => 'Impuesto 2',
                'costo' => 20.50,
                'contenido' => 'Content',
                'detalles' => 'No details',
                'organizaciones_regulatorias_id' => 1
            ]
        ]);
    }
}
