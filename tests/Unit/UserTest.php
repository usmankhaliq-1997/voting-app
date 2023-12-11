<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function check_user_isAdmin(){

        $user = User::factory()->create([
            'name' => 'usman',
            'email' => 'usmanelaahi@gmail.com'
        ]) ;

        $userB = User::factory()->create([
            'name' => 'Madara',
            'email' => 'madara@gmail.com'
        ]) ;

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($userB->isAdmin());
    }
}
