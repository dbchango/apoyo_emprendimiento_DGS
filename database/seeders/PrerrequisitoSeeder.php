<?php

namespace Database\Seeders;

use App\Models\PreRequisito;
use Illuminate\Database\Seeder;

class PrerrequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PreRequisito::create([
            [
                'requisito_id' => 1,
                'pre_requisito_id' => 2
            ]
        ]);
    }
}
