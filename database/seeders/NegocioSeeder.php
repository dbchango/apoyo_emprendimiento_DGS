<?php

namespace Database\Seeders;

use App\Models\Negocio;
use Illuminate\Database\Seeder;

class NegocioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negocio::create([
            [
                'nombre' => 'Papitas ricas',
                'ubicacion' => 'Latacunga',
                'detalles' => 'No details',
                'logo' => 'https://i.pinimg.com/736x/1d/b1/28/1db1287f36b7efacf08c912b705abb5c.jpg',
                'user_id' => 1
            ],
            [
                'nombre' => 'Fast papitas',
                'ubicacion' => 'Latacunga',
                'detalles' => 'No detalles',
                'logo' => 'https://i.pinimg.com/736x/a3/4e/98/a34e98818682f5a5f9f0d21db812a4b4--sons-lights.jpg',
                'user_id' => 1
            ]
        ]);

    }
}
