@extends('layouts.base')

@section('title')
    Welcome to Read a Blog
@endsection

@section('content')
    <main role="main" class="container"  style="margin-top: 5px">

        <div class="row">
            <div class="col-sm-8 blog-main">
                @if($posts)
                    @foreach($posts as $post)
                        <div class="blog-post">
                            <h2 class="blog-post-title">{{ $post->title }}</h2>
                            <p class="blog-post-meta"><small><i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</i></small></p>
                            <div class="text-truncate">{{ $post->description }}
                            <a href="{{ route('reader.read', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">Read more</a></div>
                        </div><!-- /.blog-post -->
                        <hr/>
                    @endforeach
                @else
                    <p class="text-center text-primary">No Posts published Yet!</p>
                @endif
            </div><!-- /.blog-main -->
        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection