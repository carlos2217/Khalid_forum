@extends('layouts.app')

@section('content')
@include('inc.messages')
@if(Auth()->user()->role == 'admin')
<div class="card">
    <div class="card-header">
        Admin
    </div>
    <div class="card-body">
        <!-- <div class="d-flex justify-content-center"> -->
        <div class="row">
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-info text-light">
                        Writer
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$writer}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-danger text-light">
                        Admins
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$admins}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-success text-light">
                        Tags
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$tags}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-primary text-light">
                        Categories
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$categories}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        My Info
    </div>
    <div class="card-body">
        <!-- <div class="d-flex justify-content-center"> -->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-info text-light">
                        My Posts
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$myposts}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-danger text-light">
                        Trash
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$trash}}</h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-success text-light">
                        Tags
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$tags}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card text-center">
                    <div class="card-header bg-primary text-light">
                        Categories
                        <br>
                        <br>
                    </div>
                    <div class="card-body">
                        <h2>{{$categories}}</h2>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- </div> -->
    </div>
</div>
@endsection