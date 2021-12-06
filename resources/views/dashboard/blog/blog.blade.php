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
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('welcome')}}">Welcome Page</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('posts.index')}}">Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('categories.index')}}">Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('tags.index')}}">Tag</a>
                    </li>
                    <li class="list-group-item mt-5">
                        <a href="{{route('posts.trashed')}}">Post Trash</a>
                    </li>
                </ul>
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