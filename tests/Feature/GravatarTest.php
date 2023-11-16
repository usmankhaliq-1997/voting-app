<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */

    public function user_can_generate_gravatar_image_when_no_email_found()
    {
        $user = User::factory()->create([
            'name' => 'usman',
            'email' => 'afakeemail@afakegmail.com'
        ]); 

        $getavatarurl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/".md5($user->email)."?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png",$getavatarurl);

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());

    }

     /** @test */

     public function user_can_generate_gravatar_image_when_no_email_found_z()
     {
         $user = User::factory()->create([
             'name' => 'usman',
             'email' => 'zfakeemail@afakegmail.com'
         ]); 
 
         $getavatarurl = $user->getAvatar();
 
         $this->assertEquals("https://www.gravatar.com/avatar/".md5($user->email)."?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png",$getavatarurl);
         $response = Http::get($user->getAvatar());

         $this->assertTrue($response->successful());
     }
 
      /** @test */

    public function user_can_generate_gravatar_image_when_no_email_found_0()
    {
        $user = User::factory()->create([
            'name' => 'usman',
            'email' => '0fakeemail@afakegmail.com'
        ]); 

        $getavatarurl = $user->getAvatar();

        $this->assertEquals("https://www.gravatar.com/avatar/".md5($user->email)."?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png",$getavatarurl);

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());

    }

     /** @test */

     public function user_can_generate_gravatar_image_when_no_email_found_9()
     {
         $user = User::factory()->create([
             'name' => 'usman',
             'email' => '9fakeemail@afakegmail.com'
         ]); 
 
         $getavatarurl = $user->getAvatar();
 
         $this->assertEquals("https://www.gravatar.com/avatar/".md5($user->email)."?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png",$getavatarurl);
 
         $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
 
     }
 
}
