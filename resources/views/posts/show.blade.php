@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">{{$post->title}}</div>
    <img src="/storage/{{ $post->post_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
    <hr>
    <div class="card-body">
        {!! $post->content !!}
    </div>
    <div class="card-footer">
        <a href="{{route('post.destroy',$post->slug)}}" class="btn btn-danger btn-sm">Delete</a>
        <a href="{{route('post.edit',$post->slug)}}" class="btn btn-success btn-sm">Edit</a>
    </div>
</div>
@stop
@section('title')
{{$post->slug}}
@stop