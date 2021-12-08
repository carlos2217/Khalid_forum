<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussinFrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.discussion.welcome', [
            'discussions' => Discussion::simplePaginate(8),
        ]);
    }
    public function show(Discussion $discussion)
    {
        return view('frontend.discussion.show', [
            'discussion' => $discussion
        ]);
    }
}
