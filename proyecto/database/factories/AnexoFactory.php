<?php

namespace Database\Factories;

use App\Models\Anexo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnexoFactory extends Factory
{
    protected $model = Anexo::class;

    public function definition()
    {
        return [
			'contenido' => $this->faker->name,
			'requisito_id' => $this->faker->name,
        ];
    }
}
