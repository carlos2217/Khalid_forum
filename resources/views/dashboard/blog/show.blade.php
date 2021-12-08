@extends('layouts.app')
@section('title')
{{$post->slug}}
@stop
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
        <!-- <a href="{{route('post.destroy',$post->slug)}}" class="btn btn-danger btn-sm">Delete</a> -->
        <!-- Button trigger trash modal -->
        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#Trash_{{$post->slug}}">Trash</button>

        <a href="{{route('post.edit',$post->slug)}}" class="btn btn-success ">Edit</a>
    </div>
</div>
<!-- Trash Modal -->
<div class="modal fade" id="Trash_{{$post->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTrash_{{$post->trash}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('post.destroy',$post->slug) }}" method="post" id="form">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelTrash_{{$post->trash}}">Trash Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Go Back</button>
                    <button type="submit" class="btn btn-danger">Yes Trash</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop