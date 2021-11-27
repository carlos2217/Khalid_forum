@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            Edit Profile
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.profile.update',$profile->user_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(isset($profile))
            <img src="/storage/{{$profile->gravater}}" alt="{{$profile->admin->name}}" height="500px" class="card-image-top img-fluid">
            @endif
            <div class="form-group">
                <input name="gravater" class="form-control" type="file" id="formFile">
            </div>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="username" name="username" id="username" class="form-control" value="{{isset($profile)?$profile->admin->name:''}}">
            </div>
            <div class="form-group">
                <input id="about" type="hidden" name="about" value="{{ isset($profile) ? $profile->about : '' }}">
                <trix-editor input="about"></trix-editor>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Url</label>
                <input type="facebook" name="facebook" id="facebook" class="form-control" value="{{isset($profile)?$profile->facebook:''}}" placeholder="URL">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube Url</label>
                <input type="youtube" name="youtube" id="youtube" class="form-control" value="{{isset($profile)?$profile->youtube:''}}" placeholder="URL">
            </div>
            <button class="btn btn-lg btn-block btn-info" type="submit">Update</button>
        </form>
    </div>

</div>
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop
@section('title')
Edite My Profile
@stop