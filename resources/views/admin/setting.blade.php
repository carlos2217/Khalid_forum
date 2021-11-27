@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">
        Settings
    </div>
    <div class="card-body">
        <form action="{{route('admin.setting.update',$setting->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sitename">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
            </div>
            <div>
                <label for="contact_number">Contact Number</label>
                <input type="number" name="contact_number" class="form-control" value="{{$setting->contact_number}}">
            </div>
            <div>
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}">
            </div>
            <div class="form-group">
                <label for="addres">Addres</label>
                <input type="text" name="addres" class="form-control" value="{{$setting->addres}}">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$setting->about}}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-info btn-block">Update</button>
        </form>
    </div>
</div>
@stop
@section('css')
@stop
@section('script')
@stop
@section('title')
Settings
@stop