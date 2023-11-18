<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeasIndex;
use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OtherFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function No_filter_works_correctly()
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

        Vote::create([
            'idea_id' => $ideaOne->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaTwo->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaThree->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaFour->id,
            'user_id' => $user->id,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('filter', 'No Filter')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 4;
            });
    }


    /** @test */
    public function top_voted_works_correctly()
    {

        $user = User::factory()->create();
        $userB = User::factory()->create();

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
            'title' => 'My third Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Fourth Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        Vote::create([
            'idea_id' => $ideaOne->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaTwo->id,
            'user_id' => $userB->id,
        ]);

        Vote::create([
            'idea_id' => $ideaTwo->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaThree->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $ideaFour->id,
            'user_id' => $user->id,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('filter', 'Top Voted')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 4 &&
                    $ideas->first()->votes()->count() === 2
                    && $ideas->get(1)->votes()->count() == 1;
            });
    }

    /** @test */
    public function my_ideas_filter_works_correctly()
    {

        $user = User::factory()->create();
        $userB = User::factory()->create();

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
            'title' => 'My Third Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $userB->id,
            'title' => 'My Fourth Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::actingAs($user)
            ->test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 3
                    && $ideas->first()->title == 'My Third Idea'
                    && $ideas->get(1)->title == 'My Second Idea';
            });
    }

    /** @test */
    public function my_ideas_filter_works_correctly_when_user_is_not_logged_in()
    {

        $user = User::factory()->create();
        $userB = User::factory()->create();

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
            'title' => 'My Third Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $userB->id,
            'title' => 'My Fourth Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::test(IdeasIndex::class)
            ->set('filter', 'My Ideas')
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function my_ideas_filter_works_correctly_with_catagory_filter()
    {

        $user = User::factory()->create();
        $userB = User::factory()->create();

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
            'title' => 'My Third Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $ideaFour = Idea::factory()->create([
            'user_id' => $userB->id,
            'title' => 'My Fourth Idea',
            'catagory_id' => $catagoryTwo->id,
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);



        Livewire::actingAs($user)
            ->test(IdeasIndex::class)
            ->set('catagory', 'Catagory 1')
            ->set('filter', 'My Ideas')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() == 2
                && $ideas->first()->title == "My Third Idea"
                && $ideas->get(1)->title == "My First Idea";
            });
    }
}
