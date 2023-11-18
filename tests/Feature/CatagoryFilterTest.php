<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeasIndex;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CatagoryFilterTest extends TestCase
{

    use RefreshDatabase;

    /** @test */

    public function catagory_filter_works_correctly()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'Catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'Catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $statusClose = Status::create([
            'name' => 'Closed',
            'classes' => 'bg-red-200'
        ]);


        $ideaOne  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaThree = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);


        Livewire::test(IdeasIndex::class)
            ->set('catagory', 'Catagory 1')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 2 && $ideas->first()->catagory->name === "Catagory 1";
            });
    }

    /** @test */

    public function catagory_query_string_filter_works_correctly()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'Catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'Catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $statusClose = Status::create([
            'name' => 'Closed',
            'classes' => 'bg-red-200'
        ]);


        $ideaOne  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaThree = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);


        Livewire::withQueryParams(['catagory' => 'Catagory 1'])
            ->test(IdeasIndex::class)
            ->set('catagory', 'Catagory 1')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 2 && $ideas->first()->catagory->name === "Catagory 1";
            });
    }


    /** @test */
    public function selecting_a_status_and_catagory_filter_works_correctly()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'Catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'Catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $statusClose = Status::create([
            'name' => 'Close',
            'classes' => 'bg-red-200'
        ]);


        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::test(IdeasIndex::class)
            ->set('status', 'Close')
            ->set('catagory', 'Catagory 2')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2 && $ideas->first()->catagory->name === "Catagory 2";
            });
    }


    /** @test */
    public function selecting_a_status_and_catagory_query_string_works_correctly()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'Catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'Catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $statusClose = Status::create([
            'name' => 'Close',
            'classes' => 'bg-red-200'
        ]);


        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::withQueryParams(['staus' => 'Close', 'catagory' => "Catagory 2"])
            ->test(IdeasIndex::class)
            ->set('status', 'Close')
            ->set('catagory', 'Catagory 2')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2 && $ideas->first()->catagory->name === "Catagory 2";
            });
    }


    /** @test */
    public function selecting_all_catagories_filter_works_correctly()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'Catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'Catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $statusClose = Status::create([
            'name' => 'Close',
            'classes' => 'bg-red-200'
        ]);


        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My third Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'fourth',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My fifth Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::test(IdeasIndex::class)
            ->set('catagory','All Catagories')
            ->assertViewHas('ideas', function ($ideas) {

                // dd($ideas->count());
                return $ideas->count() === 5;
            });
    }
}
