<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        
         User::factory()->create([
            'name' => 'usman',
            'email' => 'usmanelaahi@gmail.com'
         ]);

         User::factory(19)->create();

        $this->call([
            CatagorySeeder::class,
            StatusSeeder::class,
            IdeaSeeder::class,
            VoteSeeder::class
        ]);

    }
}
