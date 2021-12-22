@if($discussion->is_watcher())
<form action="{{route('discussion.unwatch',$discussion->slug)}}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Unsubscribe" class="unwatch">
</form>
@else
<form action="{{route('discussion.watch',$discussion->slug)}}" method="get">
    @csrf
    <input type="submit" value="Subscribe To Resave New Messages" class="watch">
</form>
@endif