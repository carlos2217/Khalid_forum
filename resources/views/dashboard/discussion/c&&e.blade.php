@extends('layouts.app')
@section('title')
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="">
            @include('inc.messages')
            <div class="card">
                <div class="card-header">
                    {{isset($discussion)? "Edit Discussion":"Create Discussion"}}
                </div>
                <div class="card-body">
                    <form action="{{isset($discussion)?route('discussion.update',$discussion->slug):route('discussion.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($discussion))
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="{{isset($discussion)?$discussion->title:old('title')}}" placeholder="Discussion Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="5" rows="5" class="form-control" required>{{isset($discussion)?$discussion->description:old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <input id="content" type="hidden" name="content" value="{{isset($discussion)?$discussion->content:old('content')}}">
                            <trix-editor input="content"></trix-editor>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Channel</label>
                            </div>
                            <select class="custom-select" name="channel_id" id="inputGroupSelect01">
                                @foreach($channels as $channel)
                                <option value="{{$channel->id}}" @if(isset($discussion)) @if($discussion->channel_id == $channel->id) selected @endif @endif>{{$channel->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(isset($discussion))
                        <img src="/storage/{{ $discussion->discussion_image }}" alt="{{ $discussion->title }}" width="100%">
                        @endif
                        <div class="form-group">
                            <input type="file" name="discussion_image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">{{isset($discussion)?'Update':'Create'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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