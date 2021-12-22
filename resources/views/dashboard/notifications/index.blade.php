@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <h1>Notifications</h1>
</div>
<form action="{{route('notificaion.read',Auth()->user()->id)}}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="notification_uuid" value="{{ $notifications->id }}">
    <button type="submit" class="btn btn-primary">Mark All Notifications As Read</button>
</form>
@foreach($notifications as $notification)
@if($notification->type == "App\Notifications\Watcher")
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Watcher</h4>
    <p>New Reply Add To <b>{{ $notification->data['discussion']['title'] }}</b></p>
    <hr>
    <div class="d-flex justify-content-between">
        <p>View Discussion</p>
        <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="btn btn-light">View Discussion</a>
    </div>
</div>
@endif
@endforeach
@stop