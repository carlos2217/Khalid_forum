<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryCreate;
use App\Http\Requests\Category\CategoryUpdate;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }
    public function store(CategoryCreate $request)
    {
        Auth()->user()->categories()->create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
        ]);
        session()->flash("success", 'Category Created');
        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }
    public function update(CategoryUpdate $request, Category $category)
    {
        $category->title = $request->title;
        $category->slug = str_slug($request->title);
        $category->save();
        session()->flash("success", 'Category Updated');
        return redirect()->route('categories.index');
    }
}
