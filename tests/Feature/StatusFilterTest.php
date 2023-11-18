<?php

namespace Tests\Feature;

use App\Http\Livewire\StatusFilter;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class StatusFilterTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function index_page_contain_status_filters_livewire_componenet()
    {

        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'catagory 2',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        $this->get(route('idea.index'))->assertSeeLivewire('status-filter');

    }



     /** @test */
     public function show_page_contain_status_filters_livewire_componenet()
     {
 
         $user = User::factory()->create();
 
         $catagoryOne = Catagory::create([
             'name' => 'catagory 1',
         ]);
 
         $catagoryTwo = Catagory::create([
             'name' => 'catagory 2',
         ]);
 
         $statusOpen = Status::create([
             'name' => 'Open',
             'classes' => 'bg-gray-200'
         ]);
 
         $idea  = Idea::factory()->create([
             'user_id' => $user->id,
             'title' => 'My First Idea',
             'catagory_id' => $catagoryOne->id,
             'status_id' => $statusOpen->id,
             'description' => 'Description of First Idea',
         ]);
 
         $this->get(route('idea.show',$idea))->assertSeeLivewire('status-filter');
 
     }


    /** @test */

    public function shows_correct_status_count(){

        $user = User::factory()->create();
 
        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'catagory 2',
        ]);

        $statusImplemented = Status::create([
            'id'  => 4,
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemented->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemented->id,
            'description' => 'Description of First Idea',
        ]);


        Livewire::test(StatusFilter::class)
        ->assertSee('All Ideas(2)')
        ->assertSee('Implmented(2)');

    }

    public function filtreing_works_when_query_string_in_place(){

        $user = User::factory()->create();
 
        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $catagoryTwo = Catagory::create([
            'name' => 'catagory 2',
        ]);

        $statusImplemented = Status::create([
            'id'  => 4,
            'name' => 'Implemented',
            'classes' => 'bg-gray-200'
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemented->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemented->id,
            'description' => 'Description of First Idea',
        ]);


        Livewire::withQueryParams(['status' => 'Implemented'])
        ->test(StatusFilter::class)
        ->assertViewHas('ideas' , function($ideas){
            return $ideas->count == 2 && $ideas->first()->status->name == "Implemented";
        });


    }
}
