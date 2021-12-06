@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">{{$discussion->title}}</div>
    <img src="/storage/{{ $discussion->discussion_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
    <hr>
    <div class="card-body">
        {!! $discussion->content !!}
    </div>
    <div class="card-footer">
        <a href="{{route('post.destroy',$discussion->slug)}}" class="btn btn-danger btn-sm">Delete</a>
        <a href="{{route('post.edit',$discussion->slug)}}" class="btn btn-success btn-sm">Edit</a>
    </div>
</div>
@stop
@section('title')
{{$discussion->slug}}
@stop