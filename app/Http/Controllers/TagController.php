<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\TagCreate;
use App\Http\Requests\Tag\TagUpdate;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('dashboard.tags.index');
    }
    public function store(TagCreate $request)
    {
        $tag = new Tag();
        $tag->create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);
        session()->flash("success", 'Tag Created');
        return redirect()->route('tags.index');
    }
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit')->with('tag', $tag);
    }
    public function update(TagUpdate $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->slug = str_slug($request->name);
        $tag->save();
        session()->flash("success", 'Tag Updated');
        return redirect()->route('tags.index');
    }
}
