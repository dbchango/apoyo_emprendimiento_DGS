<?php

namespace Database\Factories;

use App\Models\OrganizacionesRegulatoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrganizacionesRegulatoriaFactory extends Factory
{
    protected $model = OrganizacionesRegulatoria::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'direccion' => $this->faker->name,
        ];
    }
}
