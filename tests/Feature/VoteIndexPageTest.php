<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaIndex;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function index_page_contains_idea_index_livewire_component()
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


        $this->get(route('idea.index'))
            ->assertSeeLivewire('idea-index');
    }

    /** @test */

    public function index_page_correctly_recives_votes_count()
    {

        $user = User::factory()->create();

        $userB = User::factory()->create();


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


        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id
        ]);

        Vote::factory()->create([
            'user_id' => $userB->id,
            'idea_id' => $idea->id
        ]);

        $this->get(route('idea.index'))
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->first()->votes_count == 2;
            });
    }


    /** @test */
    public function votes_count_shows_correctly_on_index_page_livewire_component()
    {

        $user = User::factory()->create();

        $userB = User::factory()->create();


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


        Livewire::test(IdeaIndex::class, [
            'idea' => $idea,
            'votesCount' => 5
        ])->assertSet('votesCount', 5);
            // ->assertSeeHtml('<div class="font-semibold text-2xl">5</div>')
            // ->assertSeeHtml('<div class="text-sm font-bold leading-none">5</div>');
    }

    /**
     *  @test
     * 
     */

    public function user_who_is_logged_in_shows_voted_if_idea_is_already_voted_for_on_index_page()
    {

        $user = User::factory()->create();


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


        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id
        ]);

        $response = $this->actingAs($user)->get(route('idea.index'));

        $ideaWithVotes = $response['ideas']->items()[0];

        // dd($ideaWithVotes);

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                'idea' => $ideaWithVotes,
                'votesCount' => 5,
            ])->assertSet('hasVoted', true)
            ->assertSee('Vote');
    }


    /**
     *  @test
     * 
     */

     public function user_who_is_not_logged_in_redirected_to_login_page_when_trying_to_vote()
     {
 
         $user = User::factory()->create();
 
 
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
 
 
         Livewire::test(IdeaIndex::class, [
                 'idea' => $idea,
                 'votesCount' => 5,
             ])->call('vote')
             ->assertRedirect(route('login'));          
     }

     
      /**
     *  @test
     * 
     */

    public function user_who_is_logged_in_can_vote_for_idea()
    {

        $user = User::factory()->create();


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

        $this->assertDatabaseMissing('votes',[
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        Livewire::actingAs($user)
            ->test(IdeaIndex::class, [
                'idea' => $idea,
                'votesCount' => 5,
            ])->call('vote')
            ->assertSet('votesCount', 6)
            ->assertSet('hasVoted', true)
            ->assertSee('Voted');

        $this->assertDatabaseHas('votes',[
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);
    }

      /**
     *  @test
     * 
     */

     public function user_who_is_logged_in_can_remove_vote_for_idea()
     {
 
         $user = User::factory()->create();
 
 
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

         Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
         ]);
 
         $this->assertDatabaseHas('votes',[
             'idea_id' => $idea->id,
             'user_id' => $user->id
         ]);
 
         Livewire::actingAs($user)
             ->test(IdeaIndex::class, [
                 'idea' => $idea,
                 'votesCount' => 5,
             ])->call('vote')
             ->assertSet('votesCount', 4)
             ->assertSet('hasVoted', false);
 
         $this->assertDatabaseMissing('votes',[
             'idea_id' => $idea->id,
             'user_id' => $user->id
         ]);
     }
}
