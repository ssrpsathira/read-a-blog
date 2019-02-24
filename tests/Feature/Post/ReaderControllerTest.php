<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;

class ReaderControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $this->visit('/')
            ->see('Read a Blog')
            ->see('Admin')
            ->see('Sign in')
            ->dontSee('Logout');
    }

    public function testClickReadMore()
    {
        $this->visit('/')
            ->click('Read more')
            ->see('<p class="blog-post-meta">')
            ->dontSee('Edit Post')
            ->dontSee('Delete Post');
    }
}
