<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catagory::insert([
           ['name' => 'Catagory 1'] ,
           [ 'name' => 'Catagory 2'],
            ['name' => 'Catagory 3'],
            ['name' => 'Catagory 4'],
        ]);
    }
}
