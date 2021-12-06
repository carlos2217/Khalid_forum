@extends('layouts.app')
@section('title')
@endsection
@section('content')
<div class="jumbotron">
    <h1 class="text-center">
        Discussons
    </h1>
</div>
<a href="{{route('discussion.create')}}" class="btn btn-lg btn-info btn-block">Create Discussions</a>
<div class="row">
    @forelse ($discussins as $discussin)
    <!-- <div class="d-flex justify-content-between"> -->
    <div class="col-md-6">
        <div class="card my-2">
            <img src="/storage/{{ $discussin->discussion_image }}" alt="post image" width="100%" class="card-image-top img-fluid">
            <div class="card-body">
                {{$discussin->description}}
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">

                    <a href="{{ route('discussion.show',$discussin->slug) }}" class="btn btn-info">show</a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    @empty

    @endforelse
</div>
@endsection