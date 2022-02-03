<?php

namespace Database\Factories;

use App\Models\Negocio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NegocioFactory extends Factory
{
    protected $model = Negocio::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'ubicacion' => $this->faker->name,
			'detalles' => $this->faker->name,
			'logo' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
