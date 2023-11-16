<?php

namespace Tests\Unit;

use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function can_check_if_idea_is_voted_for_by_user()
    {

        $user = User::factory()->create();
        $userB = User::factory()->create();

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

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser($userB));
        $this->assertFalse($idea->isVotedByUser(null));
    }


    /** @test */
    public function user_can_vote_for_idea()
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

        $this->assertFalse($idea->isVotedByUser($user));
        $idea->vote($user);
        $this->assertTrue($idea->isVotedByUser($user));
    }




    /** @test */
    public function user_can_remove_vote_for_idea()
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

        $this->assertTrue($idea->isVotedByUser($user));
        $idea->removeVote($user);
        $this->assertFalse($idea->isVotedByUser($user));
    }
}
