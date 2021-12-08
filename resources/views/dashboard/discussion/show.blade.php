@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">{{$discussion->title}}</div>
    <img src="/storage/{{ $discussion->discussion_image }}" alt="discussion image" height="500px" class="card-image-top img-fluid">
    <hr>
    <div class="card-body">
        {!! $discussion->content !!}
    </div>
    <div class="card-footer">
        <!-- <a href="{{route('discussion.destroy',$discussion->slug)}}" class="btn btn-danger btn-sm">Delete</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Trash_{{$discussion->slug}}">Trash</button>
        <a href="{{route('discussion.edit',$discussion->slug)}}" class="btn btn-success btn-sm">Edit</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Trash_{{$discussion->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitleTrash_{{$discussion->slug}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('discussion.destroy',$discussion->slug)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleTrash_{{$discussion->slug}}">Trash</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Suer You Want to Trash Discussion???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Truash</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('title')
{{$discussion->slug}}
@stop