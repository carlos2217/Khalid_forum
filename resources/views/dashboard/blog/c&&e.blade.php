@extends('layouts.app')
@section('title')
Create And Updated
@stop
@section('content')
@include('inc.messages')
<div class="card">
    <div class="card-header">{{isset($post) ? "Edit Post" : "Create Post"}}</div>
    <div class="card-body">
        <form action="{{isset($post) ? route('post.update',$post->slug) : route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <input type="hidden" name="slug" value="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}" required>
            </div>
            <div class="form-group">
                <label for="discription">Discription</label>
                <textarea name="discription" id="discription" cols="5" rows="5" class="form-control" required> {{ isset($post) ? $post->discription : '' }}</textarea>
            </div>
            <div class="form-group">
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}" required>
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                @if(isset($post))
                <img src="/storage/{{ $post->post_image }}" alt="post image" height="500px" class="card-image-top img-fluid">
                @endif
                <input name="post_image" class="form-control" type="file" value="{{isset($post)?$post->post_image:''}}" id="formFile">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                </div>
                <select class="custom-select js-example-basic-multiple" name="category_id" id="inputGroupSelect01">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(isset($post)) @if($post->category->id == $category->id)
                        selected
                        @endif
                        @endif
                        >{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tags</label>
                </div>
                <select class="custom-select js-example-basic-multiple" name="tag_id[]" multiple id="inputGroupSelect01">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}" @if(isset($post)) @if($post->check($tag->id)) selected @endif @endif>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{isset($post) ? "Update" : "Create"}}</button>
        </form>
    </div>
</div>
@stop
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@stop