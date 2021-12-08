<?php

namespace App\Http\Middleware;

use App\Models\Discussion;
use Closure;
use Illuminate\Http\Request;

class DiscussionTrash
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
        if (Discussion::onlyTrashed()->count() == 0) {
            session()->flash('error', "No Discussions In The Trash");
            return redirect()->route("discussion");
        }
        return $next($request);
    }
}
