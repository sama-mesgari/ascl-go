<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => fake()->title,
            'content' => fake()->paragraph(2),
            'thumbnail_url' => 'https://placehold.co/600x400',
            'goal_amount' => 100,
            'raised_amount' => 0,
        ];
    }
}
