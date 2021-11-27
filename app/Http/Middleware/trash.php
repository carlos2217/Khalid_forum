<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class trash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Post::onlyTrashed()->count() == 0) {
            session()->flash('error', "No Posts In The Trash");
            return redirect()->route("posts.index");
        }
        return $next($request);
    }
}
