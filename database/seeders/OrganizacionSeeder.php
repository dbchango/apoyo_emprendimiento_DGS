<?php

namespace Database\Seeders;

use App\Models\OrganizacionesRegulatoria;
use Illuminate\Database\Seeder;

class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizacionesRegulatoria::create([
            [
                'nombre' => 'Servicio de Rentas Internas',
                'direccion' => 'Maldona y Juan Benigno Vela'
            ],
            [
                'nombre' => 'Municipio',
                'direccion' => 'Parque Vicente Leon'
            ]
        ]);
    }
}
