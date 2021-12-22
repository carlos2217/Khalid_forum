<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchController extends Controller
{
    public function store(Discussion $discussion)
    {
        Watcher::create([
            'user_id' => Auth()->user()->id,
            'discussion_id' => $discussion->id
        ]);
        return redirect()->back();
    }
    public function destroy()
    {
        // dd('hi');
        $watcher = Watcher::where("user_id", auth()->user()->id)->first();
        $watcher->delete();
        return redirect()->back();
    }
}
