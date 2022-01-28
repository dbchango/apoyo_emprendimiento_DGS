<?php

namespace Database\Factories;

use App\Models\Requisito;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RequisitoFactory extends Factory
{
    protected $model = Requisito::class;

    public function definition()
    {
        return [
			'costo' => $this->faker->name,
			'contenido' => $this->faker->name,
			'detalles' => $this->faker->name,
			'organizaciones_regulatorias_id' => $this->faker->name,
        ];
    }
}
