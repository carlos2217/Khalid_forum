@extends('layouts.app')

@section('content')
<a href="{{route('admin.profile.edit',$profile->user_id)}}" class="btn btn-lg btn-outline-info mb-3">Update Profile</a>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            {{$profile->admin->name}}
        </div>
    </div>
    <img src="/storage/{{$profile->gravater}}" alt="{{$profile->admin->name}}" width="50%" height="100px" class="card-image-top img-fluid">
    <div class="card-body">
        {!!$profile->about!!}
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="{{$profile->facebook}}" target="_blank" class="btn btn-info my-1">FaceBook</a>
            <a href="{{$profile->youtube}}" target="_blank" class="btn btn-danger my-1">Youtube</a>
        </div>
    </div>

</div>
@stop
@section('title')
My Profile
@stop