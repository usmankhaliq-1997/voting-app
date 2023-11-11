<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Idea::factory(30)->create();

        Idea::create([
            'user_id' => 2,
            'title' => 'My First Idea For Testing',
            'description' => 'Description for first Idea for testing',
        ]);

        Idea::create([
            'user_id' => 2,
            'title' => 'My First Idea For Testing',
            'description' => 'Description for first Idea for testing putting same title',
        ]);
    }
}
