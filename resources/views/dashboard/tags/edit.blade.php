@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">
        Edit Tag
    </div>
    <div class="card-body">
        <form action="{{route('tag.update',$tag->slug)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop
@section('title')
Edit Tag
@stop