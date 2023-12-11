<?php

namespace Tests\Feature;

use App\Http\Livewire\EditIdea;
use App\Http\Livewire\IdeaShow;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

class EditIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function show_edit_idea_livewire_componenet_when_user_is_authorize()
    {

        $user =  User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $idea =  Idea::factory()->create([
            'user_id' => $user->id,
            'catagory_id' => $catagoryOne->id,
            'status_id' => 1,
        ]);

        $this->actingAs($user)->get(route('idea.show', $idea))->assertSeeLivewire('edit-idea');
    }



    /** @test */
    public function do_not_show_edit_idea_livewire_componenet_when_user_is_unauthorize()
    {

        $user =  User::factory()->create();
        
        $idea =  Idea::factory()->create();

        $this->actingAs($user)->get(route('idea.show', $idea))->assertDontSeeLivewire('edit-idea');
    }


        /** @test */
 
        public function edit_idea_form_validation_works(){


            $user =  User::factory()->create();

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
            ]);
    


            Livewire::actingAs($user)
            ->test(EditIdea::class,['idea'=> $idea])
            ->set('title','')
            ->set('catagory','')
            ->set('description','')
            ->call('updateIdea')
            ->assertHasErrors(['title','catagory','description'])
            ->assertSee('The title field is required');
        }



        /** @test */
 
        public function editing_idea_works_when_user_has_authorization(){


            $user =  User::factory()->create();

            $catagoryOne = Catagory::factory()->create(['name' => 'Category 1']);

            $catagoryTwo = Catagory::factory()->create(['name' => 'Category 2']);

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
                'catagory_id' => $catagoryOne->id,
            ]);
    


            Livewire::actingAs($user)
            ->test(EditIdea::class,['idea'=> $idea])
            ->set('title','My Edited Idea')
            ->set('catagory',$catagoryTwo->id)
            ->set('description','This is Edited Idea')
            ->call('updateIdea')
            ->assertEmitted('ideaWasUpdated');

            $this->assertDatabaseHas('ideas',[
                'title' => 'My Edited Idea',
                'description' => 'This is Edited Idea',
                'catagory_id' => $catagoryTwo->id
            ]);
            
        }


        
        /** @test */
 
        public function editing_an_idea_show_on_menu_when_user_has_authorization(){


            $user =  User::factory()->create();

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
            ]);
    

            Livewire::actingAs($user)
            ->test(IdeaShow::class,['idea'=> $idea,'votesCount'=> 4])
            
            ->assertSee('Edit Idea');

            
            
        }
    
        
        /** @test */
 
        public function editing_an_idea_does_not_show_on_menu_when_user_has_not_authorization(){


            $user =  User::factory()->create();

            $idea =  Idea::factory()->create();
    

            Livewire::actingAs($user)
            ->test(IdeaShow::class,['idea'=> $idea,'votesCount'=> 4])
            
            ->assertDontSee('Edit Idea');

               
        }


        /** @test */

        public function editing_idea_does_not_works_when_user_has_not_authorization_because_different_user(){


            $user =  User::factory()->create();
            $userB =  User::factory()->create();

            $catagoryOne = Catagory::factory()->create(['name' => 'Category 1']);

            $catagoryTwo = Catagory::factory()->create(['name' => 'Category 2']);

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
                'catagory_id' => $catagoryOne->id,
            ]);
    


            Livewire::actingAs($userB)
            ->test(EditIdea::class,['idea'=> $idea])
            ->set('title','My Edited Idea')
            ->set('catagory',$catagoryTwo->id)
            ->set('description','This is Edited Idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
            
        }

        
        /** @test */

        public function editing_idea_does_not_works_when_user_has_not_authorization_because_idea_was_created_longer_than_one_hour_ago(){


            $user =  User::factory()->create();

            $catagoryOne = Catagory::factory()->create(['name' => 'Category 1']);

            $catagoryTwo = Catagory::factory()->create(['name' => 'Category 2']);

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
                'catagory_id' => $catagoryOne->id,
                'created_at' => now()->subHours(2),
            ]);
    


            Livewire::actingAs($user)
            ->test(EditIdea::class,['idea'=> $idea])
            ->set('title','My Edited Idea')
            ->set('catagory',$catagoryTwo->id)
            ->set('description','This is Edited Idea')
            ->call('updateIdea')
            ->assertStatus(Response::HTTP_FORBIDDEN);
            
        }
}
