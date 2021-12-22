<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussion\CreateDiscussion;
use App\Http\Requests\Discussion\UpdateDiscussion;
use App\Models\Channel;
use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('dashboard.discussion.c&&e', [
            'discussion' => $discussion,
            'channels' => Channel::all(),
        ]);
    }
    public function update(UpdateDiscussion $request, Discussion $discussion)
    {
        if ($request->hasFile('discussion_image')) {
            Storage::delete($discussion->discussion_image);
            $image = $request->discussion_image->store('discussion_image');
        } else {
            $image = $discussion->discussion_image;
        }
        Auth()->user()->discussions()->update([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
            "slug" => str_slug($request->title),
            "channel_id" => $request->channel_id,
            "discussion_image" => $image,
        ]);
        session()->flash('success', 'Descussion Updated Successfly');
        return redirect()->route('discussion.index');
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
    public function trash()
    {
        // dd(Discussion::onlyTrashed()->get());
        return view('dashboard.discussion.trash', [
            'discussions' => Discussion::onlyTrashed()->get(),
        ]);
    }
    public function restore($id, Discussion $discussion)
    {
        $discussion = Discussion::withTrashed()->where('slug', $id)->firstOrFail();
        $discussion->restore();
        session()->flash("success", 'Discussion Restored');
        return redirect()->route('discussion.index');
    }
    public function bestReply(Discussion $discussion, Reply $reply)
    {
        $discussion->bestReply = $reply->id;
        $discussion->save();
        return redirect()->back();
    }
}
