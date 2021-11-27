<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class CreatePost
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
        if (Category::all()->count() == 0) {
            session()->flash('error', "Create Category Befor You Create Post");
            return redirect()->route("categories.index");
        }
        return $next($request);
    }
}
