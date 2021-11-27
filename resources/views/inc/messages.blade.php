@if(session()->has('error'))
<div class="alert alert-danger mt-2">
    {{session()->get('error')}}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success mt-2">
    {{session()->get('success')}}
</div>
@endif
@if($errors->any())
<div class="alert alert-danger my-2">
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="">
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif