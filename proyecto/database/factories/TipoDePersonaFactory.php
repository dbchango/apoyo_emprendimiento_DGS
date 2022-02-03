<?php

namespace Database\Factories;

use App\Models\TipoDePersona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipoDePersonaFactory extends Factory
{
    protected $model = TipoDePersona::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
