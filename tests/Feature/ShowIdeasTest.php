<?php

namespace Tests\Feature;

use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function list_of_ideas_shows_on_main_page()
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
            'status_id' => $statusClose->id,
            'description' => 'Description Of Second Idea',
        ]);

        $respoonse = $this->get(route('idea.index'));

        $respoonse->assertSuccessful();
        $respoonse->assertSee($ideaOne->title);
        $respoonse->assertSee($ideaOne->description);
        $respoonse->assertSee($ideaTwo->title);
        $respoonse->assertSee($ideaTwo->description);
    }

    /** @test */

    public function single_idea_shows_correctly_on_the_show_page()
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



        $respoonse = $this->get(route('idea.show', $idea));

        $respoonse->assertSuccessful();
        $respoonse->assertSee($idea->title);
        $respoonse->assertSee($idea->description);
    }

    /** @test */

    public function ideas_pagination_works()
    {
        $user = User::factory()->create();
        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
                'user_id' => $user->id,
                'catagory_id' => $catagoryOne->id,
                'status_id'  => $statusOpen->id
        ]);

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');
        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
        //    $response->assertSuccessful();
        //    $response->assertSee($idea->title);
        //    $response->assertSee($idea->description);
        $response = $this->get('/?page=2');
        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);
    }

    /** @test */

    public function same_idea_title_different_slugs()
    {
        $user = User::factory()->create();

        $catagoryOne = Catagory::create([
            'name' => 'catagory 1',
        ]);

        $statusOpen = Status::create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);


        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My First Idea',
            'description' => 'Description For My First idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'user_id' => $user->id,
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => "My First Idea",
            'description' => "Another Idea for my First Description"
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        // dd($response);

        $response->assertSuccessful();

        // dd(request()->path());

        $this->assertTrue(request()->path() === 'idea/my-first-idea');

        $response = $this->get(route('idea.show',$ideaTwo));

        $this->assertTrue(request()->path() === 'idea/my-first-idea-2');
    }
}
