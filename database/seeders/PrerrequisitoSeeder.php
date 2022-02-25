<?php

namespace Database\Seeders;

use App\Models\PreRequisito;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrerrequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pre_requisitos')->insert([
            [
                'requisito_id' => 1,
                'pre_requisito_id' => 2
            ]
        ]);
    }
}
