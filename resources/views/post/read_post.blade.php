@extends('layouts.base')

@section('title')
    Welcome to Read a Blog
@endsection

@section('content')
    <main role="main" class="container"  style="margin-top: 5px">
        @include('partials.post_content', ['post' => $post])
    </main><!-- /.container -->
@endsection