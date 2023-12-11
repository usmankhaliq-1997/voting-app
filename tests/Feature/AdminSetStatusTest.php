<?php

namespace Tests\Feature;

use App\Http\Livewire\SetStatus;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdminSetStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_page_contains_set_status_livewire_component_when_user_is_admin(){

        $user = User::factory()->create([
            'name' => 'usman',
            'email' => 'usmanelaahi@gmail.com'
        ]);

        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
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

        $this->actingAs($user)
        ->get(route('idea.show',$idea))
        ->assertSeeLivewire('set-status');

    }


        /** @test */
        public function show_page_does_not_contains_set_status_livewire_component_when_user_is_not_admin(){

            $user = User::factory()->create([
                'name' => 'usman',
                'email' => 'usmandgelaahi@gmail.com'
            ]);
    
            $catagoryOne = Catagory::create([
                'name' => 'catagory 1',
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
    
            $this->actingAs($user)
            ->get(route('idea.show',$idea))
            ->assertDontSeeLivewire('set-status');
    
        }


        /** @test */

        public function show_page_contain_right_status(){

            $user = User::factory()->create([
                'name' => 'usman',
                'email' => 'usmanelaahi@gmail.com'
            ]);
    
            $catagoryOne = Catagory::create([
                'name' => 'catagory 1',
            ]);
    
            $statusOpen = Status::create([
                'name' => 'Open',
                'classes' => 'bg-gray-200'
            ]);

            $statusConsider = Status::create([
                'name' => 'Considering',
                'classes' => 'bg-gray-200'
            ]);
    
    
            $idea  = Idea::factory()->create([
                'user_id' => $user->id,
                'title' => 'My First Idea',
                'catagory_id' => $catagoryOne->id,
                'status_id' => $statusOpen->id,
                'description' => 'Description of First Idea',
            ]);
            
           Livewire::actingAs($user)
           ->test(SetStatus::class,[
            'idea' => $idea
           ])
           ->assertSet('status',$statusOpen->id);
        }

        /** @test */

        public function can_set_status_correctly(){

            $user = User::factory()->create([
                'name' => 'usman',
                'email' => 'usmanelaahi@gmail.com'
            ]);
    
            $catagoryOne = Catagory::create([
                'name' => 'catagory 1',
            ]);
    
            $statusOpen = Status::create([
                'name' => 'Open',
                'classes' => 'bg-gray-200'
            ]);

            $statusConsider = Status::create([
                'name' => 'Considering',
                'classes' => 'bg-gray-200'
            ]);
    
    
            $idea  = Idea::factory()->create([
                'user_id' => $user->id,
                'title' => 'My First Idea',
                'catagory_id' => $catagoryOne->id,
                'status_id' => $statusOpen->id,
                'description' => 'Description of First Idea',
            ]);
            
           Livewire::actingAs($user)
           ->test(SetStatus::class,[
            'idea' => $idea
           ])
           ->set('status',$statusConsider->id)
           ->call('setStatus')
           ->assertEmitted('statusFireEvent');
            
           $this->assertDatabaseHas('ideas',[
                'id' => $idea->id,
                'status_id' => $statusConsider->id
           ]);
        }
}

