<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name, // Gera um nome aleatório
            'nascimento' => $this->faker->date('d/m/Y'), // Gera uma data de nascimento aleatória
            'codigo' => $this->faker->unique()->numberBetween(0, 999999), // Gera um código único para o paciente
            'guia' => $this->faker->numberBetween(0, 999999), // Gera um número de guia aleatório
            'entrada' => $this->faker->date('d/m/Y'), // Gera uma data e hora de entrada aleatória
            'saida' => $this->faker->optional()->date('d/m/Y'), // Gera uma data e hora de saída (opcional)
        ];
    }
}
