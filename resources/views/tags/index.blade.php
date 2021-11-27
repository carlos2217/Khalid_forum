@extends('layouts.app')

@section('content')
<!-- <div class="jumbotron">
    <h1 class="text-center">My Posts</h1>
</div> -->
@include('inc.messages')
<div class="card my-3">
    <div class="card-header">
        Create Tag
    </div>
    <div class="card-body">
        <form action="{{route('tag.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tag</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">Tags</div>
    <div class="card-body">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Posts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->posts()->count()}}</td>
                    <td>
                        <a href="{{route('tag.edit',$tag->slug)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="tect-center">No Tags Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
@section('title')
Tags
@stop