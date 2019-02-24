<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }

    public function getPostForm()
    {
        return view('post/post_form');
    }

    public function createPost(Request $request)
    {
        $post = Post::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description')
        ));

        return redirect()->route('home')->with('success', 'Post has been successfully added!');
    }

    public function getPost($id)
    {
        $post = Post::find($id);

        return view('post/post_details', ['post' => $post]);
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        return view('post/edit_post', ['post' => $post]);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = Input::get('title');
        $post->description = Input::get('description');

        $post->save();

        return redirect()->route('home')->with('success', 'Post has successfully been updated!');
    }

    public function deletePost($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('home')->with('success', 'Post has successfully been deleted!');
    }
}
