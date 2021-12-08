@extends('layouts.app')
@section('title')
@stop
@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Blog Post</div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{route('welcome')}}" class="list-group-item list-group-item-action">Posts Page</a>
                    <a href="{{route('posts.index')}}" class="list-group-item list-group-item-action">Posts</a>
                    <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Category</a>
                    <a href="{{route('tags.index')}}" class="list-group-item list-group-item-action">Tag</a>
                    <a href="{{route('posts.trashed')}}" class="list-group-item list-group-item-action">Post Trash</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="jumbotron">
            <h1>Blog</h1>
        </div>
    </div>
</div>
@stop