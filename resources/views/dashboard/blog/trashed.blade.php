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
        <div class="d-flex justify-content-start">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#Restore_{{$post->slug}}">Restore</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_{{$post->slug}}">Delete</button>
        </div>
        <!-- <div class="">
            <a href="{{route('post.destroy',$post->slug)}}" class="btn btn-danger btn-sm float-right mr-3">Deleete</a>
        </div> -->
    </div>
</div>


<!-- Restore Modal Starts -->
<div class="modal fade" id="Restore_{{$post->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle_{{$post->slug}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('post.restore',$post->slug)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleRestore_{{$post->slug}}">Restore</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do You Want To Restore Post???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Yes Restore</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Restore Modal Ends -->

<!-- Delete Modal Starts -->
<div class="modal fade" id="Delete_{{$post->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitleDelete_{{$post->slug}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{route('post.destroy',$post->slug)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleDelete_{{$post->slug}}">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do You Want To Delete Post???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Delete Modal Ends -->
@endforeach
@stop
@section('title')
Post Trash
@stop