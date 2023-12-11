<?php

namespace Tests\Feature;

use App\Http\Livewire\DeleteIdea;
use App\Http\Livewire\IdeaShow;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function show_delete_idea_livewire_componenet_when_user_is_authorize()
    {

        $user =  User::factory()->create();

        $idea =  Idea::factory()->create([
            'user_id' => $user->id,
            
        ]);

        $this->actingAs($user)->get(route('idea.show', $idea))->assertSeeLivewire('delete-idea');
    }



    /** @test */
    public function do_not_show_delete_idea_livewire_componenet_when_user_is_unauthorize()
    {

        $user =  User::factory()->create();
        
        $idea =  Idea::factory()->create();

        $this->actingAs($user)->get(route('idea.show', $idea))->assertDontSeeLivewire('delete-idea');

    }


  

       /** @test */
 
        public function deleting_an_idea_works_when_user_has_authorization(){


            $user =  User::factory()->create();

            
            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
            ]);
    


            Livewire::actingAs($user)
            ->test(DeleteIdea::class,['idea'=> $idea])
             ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

            $this->assertEquals(0,Idea::count());

            
        }


         /** @test */
 
         public function deleting_an_idea_works_when_user_is_admin(){
   
            $user =  User::factory()->admin()->create();
            
            $idea =  Idea::factory()->create();
    


            Livewire::actingAs($user)
            ->test(DeleteIdea::class,['idea'=> $idea])
             ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

            $this->assertEquals(0,Idea::count());

            
        }



        /** @test */
        public function deleting_an_idea_with_votes_works_when_user_has_authorization(){


            $user =  User::factory()->create();

            
            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
            ]);
    
            Vote::factory()->create([
                'user_id' =>$user->id,
                'idea_id' => $idea->id,
            ]);


            Livewire::actingAs($user)
            ->test(DeleteIdea::class,['idea'=> $idea])
             ->call('deleteIdea')
            ->assertRedirect(route('idea.index'));

            $this->assertEquals(0,Idea::count());
            $this->assertEquals(0,Vote::count());
            
        }

        
        /** @test */
 
        public function deleting_an_idea_show_on_menu_when_user_has_authorization(){


            $user =  User::factory()->create();

            $idea =  Idea::factory()->create([
                'user_id' => $user->id,
            ]);
    

            Livewire::actingAs($user)
            ->test(IdeaShow::class,['idea'=> $idea,'votesCount'=> 4])
            
            ->assertSee('Delete Idea');

            
            
        }
    
        
        /** @test */
 
        public function deleting_an_idea_does_not_show_on_menu_when_user_has_not_authorization(){


            $user =  User::factory()->create();

            $idea =  Idea::factory()->create();
    

            Livewire::actingAs($user)
            ->test(IdeaShow::class,['idea'=> $idea,'votesCount'=> 4])
            
            ->assertDontSee('Delete Idea');

               
        }


    //     /** @test */

    //     public function editing_idea_does_not_works_when_user_has_not_authorization_because_different_user(){


    //         $user =  User::factory()->create();
    //         $userB =  User::factory()->create();

    //         $catagoryOne = Catagory::factory()->create(['name' => 'Category 1']);

    //         $catagoryTwo = Catagory::factory()->create(['name' => 'Category 2']);

    //         $idea =  Idea::factory()->create([
    //             'user_id' => $user->id,
    //             'catagory_id' => $catagoryOne->id,
    //         ]);
    


    //         Livewire::actingAs($userB)
    //         ->test(EditIdea::class,['idea'=> $idea])
    //         ->set('title','My Edited Idea')
    //         ->set('catagory',$catagoryTwo->id)
    //         ->set('description','This is Edited Idea')
    //         ->call('updateIdea')
    //         ->assertStatus(Response::HTTP_FORBIDDEN);
            
    //     }

        
    //     /** @test */

    //     public function editing_idea_does_not_works_when_user_has_not_authorization_because_idea_was_created_longer_than_one_hour_ago(){


    //         $user =  User::factory()->create();

    //         $catagoryOne = Catagory::factory()->create(['name' => 'Category 1']);

    //         $catagoryTwo = Catagory::factory()->create(['name' => 'Category 2']);

    //         $idea =  Idea::factory()->create([
    //             'user_id' => $user->id,
    //             'catagory_id' => $catagoryOne->id,
    //             'created_at' => now()->subHours(2),
    //         ]);
    


    //         Livewire::actingAs($user)
    //         ->test(EditIdea::class,['idea'=> $idea])
    //         ->set('title','My Edited Idea')
    //         ->set('catagory',$catagoryTwo->id)
    //         ->set('description','This is Edited Idea')
    //         ->call('updateIdea')
    //         ->assertStatus(Response::HTTP_FORBIDDEN);
            
    //     }
}
