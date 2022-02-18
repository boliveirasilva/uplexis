<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carro>
 */
class CarroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'nome_veiculo' => $this->faker->randomElement(['Honda Civic', 'Toyota Corolla', 'Fiat Palio']),
            'link' => $this->faker->url,
            'ano' => $this->faker->year,
            'combustivel' => $this->faker->randomElement(['Gasolina', 'Alcool', 'Diesel']),
            'portas' => $this->faker->numberBetween(2, 4),
            'quilometragem' => $this->faker->numberBetween(0, 200000),
            'cambio' => $this->faker->randomElement(['Manual', 'Automático']),
            'cor' => $this->faker->colorName,
            'preco' => $this->faker->randomFloat(2, 7500, 199999.99)
        ];
    }
}
