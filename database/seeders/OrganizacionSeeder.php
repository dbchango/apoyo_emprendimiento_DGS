<?php

namespace Database\Seeders;

use App\Models\OrganizacionesRegulatoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizaciones_regulatorias')->insert(
            [
                [
    
                    'nombre' => 'Servicio de Rentas Internas',
                    'direccion' => 'Maldona y Juan Benigno Vela'
                ],
                [
    
                    'nombre' => 'Servicio de Rentas Internas',
                    'direccion' => 'Maldona y Juan Benigno Vela'
                ]
            ]
        );

    }
}
