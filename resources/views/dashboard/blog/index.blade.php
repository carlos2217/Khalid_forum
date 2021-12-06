@extends('layouts.app')

@section('content')
<!-- <div class="jumbotron">
    <h1 class="text-center">My Posts</h1>
</div> -->
@include('inc.messages')
<a href="{{route('posts.create')}}" class="btn btn-lg btn-info btn-block">Create Post</a>
@forelse($posts as $post)
<div class="card my-3">
    <div class="card-header">{{$post->title}}</div>
    <img src="/storage/{{ $post->post_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
    <hr>
    <div class="card-body">{{$post->discription}}</div>
    <div class="card-footer">
        <a href="{{route('post.show',$post->slug)}}" class="btn btn-success btn-sm float-right">Show</a>
    </div>
</div>
@empty
@endforelse
@stop
@section('title')
Posts
@stop