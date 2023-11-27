<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'nome' => $this->faker->name(),
          'descricao' => $this->faker->sentence(),
          'imagem' => $this->faker->imageUrl(),
          'curso_id'=> (Curso::all()->random(1)->first())->id,
          'contratado' => $this->faker->boolean(),
          
        ];
    }
}
