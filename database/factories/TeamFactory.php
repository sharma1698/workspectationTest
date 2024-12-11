<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\TutorProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Team::class;
    public function definition(): array
    {
        return [
            'tutor_product_id' => TutorProduct::factory(),
            'name' => $this->faker->name,
            'contact' => $this->faker->email,
            'website' => $this->faker->url,
        ];
    }
}
