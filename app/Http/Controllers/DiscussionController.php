<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussion\CreateDiscussion;
use App\Models\Channel;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiscussionController extends Controller
{
    public function index()
    {
        // dd(Discussion::mydiscussions());
        return view('dashboard.discussion.index', [
            'discussins' => Discussion::mydiscussions(),
        ]);
    }
    public function create()
    {
        return view('dashboard.discussion.c&&e', [
            'channels' => Channel::all(),
        ]);
    }

    public function store(CreateDiscussion $request)
    {
        $image = $request->discussion_image->store('discussion_image');
        auth()->user()->discussions()->create([
            'user_id' => request()->user()->id,
            'channel_id' => $request->channel_id,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'slug' => str_slug($request->title),
            'discussion_image' => $image,
        ]);
        session()->flash('success', 'Descussion Creared Successfly');
        return redirect()->route('discussion.index');
    }
    public function show(Discussion $discussion)
    {
        return view('dashboard.discussion.show', [
            'discussion' => $discussion,
        ]);
    }
    public function edit(Discussion $discussion)
    {
        return view('dashboard.discussion.c&&e')->with('discussion', $discussion);
    }
    public function destroy($id)
    {
        // dd(Post::findOrFail($id)->withTrashed()->get());
        $discussion = Discussion::withTrashed()->where('slug', $id)->firstOrFail();
        // dd($post->trashed());
        if ($discussion->trashed()) {
            Storage::delete($discussion->discussion_image);
            $discussion->forceDelete();
        } else {
            $discussion->delete();
        }
        session()->flash("success", 'Post Deleted');
        return redirect()->route('discussion.index');
    }
}
