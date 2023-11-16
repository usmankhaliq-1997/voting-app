<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\Catagory;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function create_idea_form_does_not_show_when_logged_out()
    {

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee('please login to create an idea');

        $response->assertDontSee('Let us know what you would like to');
    }

    /** @test */

    public function create_idea_form_does_not_show_when_logged_in()
    {

        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertDontSee('please login to create an idea');

        $response->assertSee('Let us know what you would like to');
    }

    /** @test */

    public function main_page_contains_create_idea_livewire_component(){

         $this->actingAs(User::factory()->create())
         ->get(route('idea.index'))
         ->assertSeeLivewire('create-idea');

    }

    /** @test */

    public function create_idea_form_validation_works(){
        Livewire::actingAs(User::factory()->create())
        ->test(CreateIdea::class)
        ->set('title','')
        ->set('catagory','')
        ->set('description','')
        ->call('createIdea')
        ->assertHasErrors(['title','catagory','description'])
        ->assertSee('The title field is required');
    }


    /** @test */
    public function creating_an_idea_works_correctly(){

        $user = User::factory()->create();

        $catagoryOne = Catagory::factory()->create(['name' => 'Catagory 1']);
        // $catagoryTwo = Catagory::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open','classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
        ->test(CreateIdea::class)
        ->set('title','My First Idea')
        ->set('catagory',$catagoryOne->id)
        ->set('description','This is My First Idea')
        ->call('createIdea')
        ->assertRedirect('/');

        $response = $this->actingAs($user)->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee("My First Idea");

        $response->assertSee('This is My First Idea');

        $this->assertDatabaseHas('ideas',[
            'title' => "My First Idea"

        ]);
    }
    
        /** @test */
        public function creating_two_ideas_with_same_title_still_works_but_different_slugs(){

            $user = User::factory()->create();
    
            $catagoryOne = Catagory::factory()->create(['name' => 'Catagory 1']);
            // $catagoryTwo = Catagory::factory()->create();
    
            $statusOpen = Status::factory()->create(['name' => 'Open','classes' => 'bg-gray-200']);
    
            Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title','My First Idea')
            ->set('catagory',$catagoryOne->id)
            ->set('description','This is My First Idea')
            ->call('createIdea')
            ->assertRedirect('/');
    
    
    
            $this->assertDatabaseHas('ideas',[
                'title' => "My First Idea",
                'slug' => 'my-first-idea',
    
            ]);

            Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title','My First Idea')
            ->set('catagory',$catagoryOne->id)
            ->set('description','This is My First Idea')
            ->call('createIdea')
            ->assertRedirect('/');
    
    
    
            $this->assertDatabaseHas('ideas',[
                'title' => "My First Idea",
                'slug' => 'my-first-idea-2',
    
            ]);
        }
}
