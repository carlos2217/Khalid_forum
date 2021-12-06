@extends('layouts.app')
@section('title')
@stop
@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header">
                Channels
            </div>
            <div class="card-body">
                <div class="list-group">
                    @forelse ($channels as $channel)
                    <a href="#" class="list-group-item list-group-item-action">{{$channel->title}}</a>
                    @empty
                        <p class="text-center">
                            no channels
                        </p>
                    @endforelse
                    </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Discussions</div>
            <div class="card-body">
                <div class="list-group">
                    
                        <a href="{{route('welcome')}}" class="list-group-item list-group-item-action">Welcome Page</a>
                        <a href="{{route('discussion.index')}}" class="list-group-item list-group-item-action">Discussions</a>
                        <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Category</a>
                        <a href="{{route('tags.index')}}" class="list-group-item list-group-item-action">Tag</a>
                        <a href="{{route('posts.trashed')}}" class="list-group-item list-group-item-action mb-3">Post Trash</a>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="jumbotron">
            <h1>Discussions</h1>
        </div>
    </div>
</div>
@stop