<?php

namespace Database\Factories;

use App\Models\PreRequisito;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PreRequisitoFactory extends Factory
{
    protected $model = PreRequisito::class;

    public function definition()
    {
        return [
			'requisito_id' => $this->faker->name,
			'pre_requisito_id' => $this->faker->name,
        ];
    }
}
