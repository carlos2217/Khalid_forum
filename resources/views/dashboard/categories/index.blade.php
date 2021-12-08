@extends('layouts.app')

@section('content')
<!-- <div class="jumbotron">
    <h1 class="text-center">My Posts</h1>
</div> -->
@include('inc.messages')
<div class="card my-3">
    <div class="card-header">
        Create Category
    </div>
    <div class="card-body">
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card my-3">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Posts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->posts()->count()}}</td>
                    <td>
                        <a href="{{route('category.edit',$category->slug)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="tect-center">No Categories Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop
@section('title')
Category
@stop