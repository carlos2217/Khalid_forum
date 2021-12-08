@extends('layouts.app')
@section('title')
Discussions Trash
@stop
@section('content')
@include('inc.messages')
<div class="row">
    @foreach($discussions as $discussion)
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{$discussion->title}}</div>
            <img src="/storage/{{ $discussion->discussion_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
            <hr>
            <div class="card-body">{{$discussion->description}}</div>
            <div class="card-footer">
                <div class="d-flex justify-content-start">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#Delete_{{$discussion->slug}}">Delete</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Restore_{{$discussion->slug}}">Restore</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete Modal Starts -->
    <div class="modal fade" id="Delete_{{$discussion->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitleDelete_{{$discussion->slug}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{route('discussion.destroy',$discussion->slug)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitleDelete_{{$discussion->slug}}">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure You Want to Delete Discussion???
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
    <!-- Restore Modal Starts -->
    <div class="modal fade" id="Restore_{{$discussion->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitleRestore_{{$discussion->slug}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{route('discussion.restore',$discussion->slug)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitleRestore_{{$discussion->slug}}">Restore</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure You Want To Restore Discussion???
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
    @endforeach
</div>
@stop