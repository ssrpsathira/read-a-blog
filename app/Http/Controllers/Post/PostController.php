<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function create(Request $request)
    {
        Post::create(array(
            'title' => Input::get('title'),
            'description' => Input::get('description')
        ));

        return response()->json('success');

    }

    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function get($id)
    {
        return $this->edit($id);
    }

    public function edit($id)
    {
        $post = Post::find((string)$id);

        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find((string)$id);

        $post->title = Input::get('title');
        $post->description = Input::get('description');

        $post->save();

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $post = Post::find((string)$id);

        $post->delete();

        return response()->json('successfully deleted');
    }
}
