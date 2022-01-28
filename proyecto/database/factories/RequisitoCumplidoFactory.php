<?php

namespace Database\Factories;

use App\Models\RequisitoCumplido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RequisitoCumplidoFactory extends Factory
{
    protected $model = RequisitoCumplido::class;

    public function definition()
    {
        return [
			'requisito_id' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
