<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Reply $reply)
    {
        Like::create([
            'user_id' => Auth()->user()->id,
            'reply_id' => $reply->id,
        ]);
        return redirect()->back();
    }
    public function unlike(Reply $reply)
    {
        $like = Like::where("user_id", auth()->user()->id)->first();
        $like->delete();
        return redirect()->back();
    }
}
