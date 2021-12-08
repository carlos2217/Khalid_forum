@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">
        Edit Category
    </div>
    <div class="card-body">
        <form action="{{route('category.update',$category->slug)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop
@section('title')
Edite Category
@stop