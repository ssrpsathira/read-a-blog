<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function userCanCreatePosts()
    {
        $user = factory(User::class)->create();

        $post = [
            'title' => 'Test title 1',
            'description' => 'Test desc 1'
        ];

        $response = $this->actingAs($user)->json('POST', 'post/create', $post);

        $this->assertEquals(201, $response->getStatus());
//        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', $post);
    }

}
