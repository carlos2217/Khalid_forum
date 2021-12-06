@extends('layouts.app')

@section('content')
<!-- <div class="jumbotron">
    <h1 class="text-center">My Posts</h1>
</div> -->
@include('inc.messages')
@foreach($posts as $post)
<div class="card my-3">
    <div class="card-header">{{$post->title}}</div>
    <img src="/storage/{{ $post->post_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
    <hr>
    <div class="card-body">{{$post->discription}}</div>
    <div class="card-footer">
        <div class="">
            <form action="{{route('post.resore',$post->slug)}}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success btn-sm float-right">Resore</button>
            </form>
        </div>
        <div class="">
            <a href="{{route('post.destroy',$post->slug)}}" class="btn btn-danger btn-sm float-right mr-3">Deleete</a>
        </div>
    </div>
</div>
@endforeach
@stop
@section('title')
Post Trash
@stop