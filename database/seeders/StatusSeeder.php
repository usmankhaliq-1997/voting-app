<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Status::insert([
            ['name' => 'Open', 'classes' => 'bg-gray-200'],
            ['name' => 'Considering', 'classes' => 'bg-purple-600 text-white'],
            ['name' => 'In Progress', 'classes' => 'bg-yellow-600 text-white'],
            ['name' => 'Implemented', 'classes' => 'bg-green-600 text-white'],
            ['name' => 'Closed', 'classes' => 'bg-red-600 text-white'],
        ]);
    }
}
