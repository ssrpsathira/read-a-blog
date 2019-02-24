<h1>{{ $post->title }}</h1>
<p class="blog-post-meta"><small><i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</i></small></p>
<div class="col-sm-8 blog-main">
    <p>{{ $post->description }}</p>

    @auth
        <a href="{{ route('post.edit', ['id' => $post->id]) }}">
            <button type="button" class="btn btn-primary btn-sm">Edit Post</button>
        </a>
        <a href="{{ route('post.delete', ['id' => $post->id]) }}">
            <button type="button" class="btn btn-danger btn-sm">Delete Post</button>
        </a>
    @endauth
</div>