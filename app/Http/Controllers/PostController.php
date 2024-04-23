<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'category_id' => ['required', Rule::exists('categories','id')],
            'excerpt' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/')->with('message','post created successfully!');
    }
}
