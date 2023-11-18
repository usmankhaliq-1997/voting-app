<?php

namespace Tests\Unit;

use App\Models\Catagory;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusCountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function can_get_count_of_each_status()
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

        $statusConsider = Status::create([
            'name' => 'Considering',
            'classes' => 'bg-gray-200'
        ]);

        $statusInprogress = Status::create([
            'name' => 'In Progress',
            'classes' => 'bg-gray-200'
        ]);

        $statusImplemeted = Status::create([
            'name' => 'Implemented',
            'classes' => 'bg-gray-200'
        ]);

        $statusClosed = Status::create([
            'name' => 'Closed',
            'classes' => 'bg-gray-200'
        ]);


        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusConsider->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusConsider->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusInprogress->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusInprogress->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusInprogress->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemeted->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemeted->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemeted->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusImplemeted->id,
            'description' => 'Description of First Idea',
        ]);

        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClosed->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClosed->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClosed->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClosed->id,
            'description' => 'Description of First Idea',
        ]);
        $idea  = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'catagory_id' => $catagoryOne->id,
            'status_id' => $statusClosed->id,
            'description' => 'Description of First Idea',
        ]);


        $this->assertEquals(15, Status::getCount()['all_statuses']);
        $this->assertEquals(1, Status::getCount()['open']);
        $this->assertEquals(2, Status::getCount()['considering']);
        $this->assertEquals(3, Status::getCount()['in_progress']);
        $this->assertEquals(4, Status::getCount()['implemented']);
        $this->assertEquals(5, Status::getCount()['closed']);


    }
}
