@extends('layouts.app')
@section('content')
<div class="">
    @include('inc.messages')
    <table class="table text-center">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <img src="/storage/{{$user->profile->gravater}}" alt="{{$user->name}}" width="100%" height="50px">
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->role}}</td>
                <td>
                    @if(Auth()->user()->id == $user->id)
                    <button class="btn btn-dark btn-sm unable">You</button>
                    @else
                    <!-- <div class="d-flex justify-content-between"> -->
                    @if($user->role == "admin")
                    <div class="d-flex justify-content-around">
                        <div>
                            <button class="btn btn-success btn-sm">Admin</button>
                        </div>
                        <div>
                            <form action="{{route('admin.removeAdmin',$user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-danger btn-sm">Remove Admtion</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="">
                        <form action="{{route('admin.makeAsAdmin',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-success btn-sm">Make As Amdim</button>
                        </form>
                    </div>
                    @endif
                    <!-- </div> -->
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
@section('title')
Manage Users
@stop