<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionFrontEndController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $discussion = Discussion::where('title', 'like', "%{$search}%")->get();
        } else {
            $discussion = Discussion::simplePaginate(8);
        }
        return view('frontend.discussion.welcome', [
            'discussions' => $discussion,
        ]);
    }
    public function show(Discussion $discussion)
    {
        return view('frontend.discussion.show', [
            'discussion' => $discussion
        ]);
    }
    public function channel(Channel $channel)
    {
        return view('frontend.discussion.channel', [
            'channel' => $channel
        ]);
    }
}
