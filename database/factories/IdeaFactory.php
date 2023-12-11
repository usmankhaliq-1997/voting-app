<?php

namespace Database\Factories;

use App\Models\Catagory;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'catagory_id' =>Catagory::factory(),
            'status_id' => Status::factory(),
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
