<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testSignin()
    {
        $this->visit('/')
            ->click('Sign in')
            ->seePageIs('/login')
            ->see('name="email"')
            ->see('name="remember"')
            ->see('Login')
            ->see('Forgot Your Password?')
            ->type('ssrpsathira@gmail.com', 'email')
            ->type('sathira123', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->see('Post')
            ->see('Post')
            ->see('Posts')
            ->see('Create Post')
            ->see('Admin')
            ->see('Logout');
    }

    public function testAdminViewMore()
    {
        $this->visit('/login')
            ->type('ssrpsathira@gmail.com', 'email')
            ->type('sathira123', 'password')
            ->press('Login')
            ->see('Title')
            ->see('Learn more')
            ->see('Created on')
            ->see('view more')
            ->click('view more')
            ->see('Edit Post')
            ->see('Delete Post');
    }

    public function testAdminCreatePost()
    {
        $this->visit('/login')
            ->type('ssrpsathira@gmail.com', 'email')
            ->type('sathira123', 'password')
            ->press('Login')
            ->click('Create Post')
            ->see('Create Post')
            ->see('Title')
            ->see('Enter Title')
            ->see('Description')
            ->type('unit test title', 'title')
            ->type('unit test description', 'description')
            ->press('Create post')
            ->seePageIs('/home')
            ->see('Post has been successfully added!')
            ->see('unit test title');
    }

    public function testEditPost()
    {
        $this->visit('/login')
            ->type('ssrpsathira@gmail.com', 'email')
            ->type('sathira123', 'password')
            ->press('Login')
            ->click('view more')
            ->click('Edit Post')
            ->type('unit test edited title', 'title')
            ->type('unit test edited description', 'description')
            ->press('update post')
            ->seePageIs('/home')
            ->see('Post has successfully been updated!')
            ->see('unit test edited title');
    }

    public function testDeletePost()
    {
        $this->visit('/login')
            ->type('ssrpsathira@gmail.com', 'email')
            ->type('sathira123', 'password')
            ->press('Login')
            ->click('view more')
            ->click('Delete Post')
            ->seePageIs('/home')
            ->see('Post has successfully been deleted!');
    }
}
