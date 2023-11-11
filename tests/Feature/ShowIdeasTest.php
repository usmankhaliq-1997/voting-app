<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function list_of_ideas_shows_on_main_page()
    {
        $ideaOne  = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description of First Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
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
         $idea  = Idea::factory()->create([
             'title' => 'My First Idea',
             'description' => 'Description of First Idea',
         ]);
 
         
 
         $respoonse = $this->get(route('idea.show',$idea));
 
         $respoonse->assertSuccessful();
         $respoonse->assertSee($idea->title);
         $respoonse->assertSee($idea->description);
         
     }

       /** @test */

       public function ideas_pagination_works()
       {

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();
   
        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
       $ideaEleven->title = 'My Eleventh Idea';
       $ideaEleven->save();
           
   
           $respoonse = $this->get('/');
   
           $respoonse->assertSee($ideaOne->title);
           $respoonse->assertDontSee($ideaEleven->title);
        //    $respoonse->assertSuccessful();
        //    $respoonse->assertSee($idea->title);
        //    $respoonse->assertSee($idea->description);
        $respoonse = $this->get('/?page=2');

        $respoonse->assertSee($ideaEleven->title);
        $respoonse->assertDontSee($ideaOne->title);
       }

          /** @test */

     public function same_idea_title_different_slugs(){
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description For My First idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => "My First Idea",
            'description' => "Another Idea for my First Description"
        ]);

        $respoonse = $this->get(route('idea.show',$ideaOne));

        $respoonse->assertSuccessful();

        $this->assertTrue(request()->path() == 'ideas/my-first-idea');

        // $respoonse = $this->get(route('idea.show',$ideaOne));

        // $this->assertTrue(request()->path() == 'ideas/my-first-idea-2');
     }
}
