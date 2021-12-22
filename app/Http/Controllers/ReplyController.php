<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Discussion;
use App\Models\Reply;
use App\Models\User;
use App\Notifications\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Discussion $discussion, Request $request)
    {
        // dd('id');
        $d = Discussion::findOrFail($discussion->id);
        Auth()->user()->replies()->create([
            'discussion_id' => $discussion->id,
            'content' => $request->content
        ]);
        $watchers = array();
        foreach ($d->watchers as $watcher) :
            if (Auth::id() == $watcher->user_id) {
                array_push($watchers, User::find($watcher->user_id));
            }
        endforeach;
        // dd($watchers);
        Notification::send($watchers, new Watcher($discussion));
        return redirect()->back();
    }
    public function destroy(Discussion $discussion, Reply $reply)
    {
        // dd($reply->id);
        $reply->delete();
        return redirect()->back();
    }
}
