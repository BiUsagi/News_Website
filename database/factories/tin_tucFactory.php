<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tin_tuc>
 */
class tin_tucFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tieuDe' => $this->faker->sentence,
            'tomTat' => $this->faker->paragraph,
            'noiDung' => $this->faker->text,
            'hinhAnh' => $this->faker->imageUrl,
            'ngayDang' => $this->faker->date,
            'luotXem' => $this->faker->numberBetween(0, 1000),
            'idDm' => $this->faker->numberBetween(1, 10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
