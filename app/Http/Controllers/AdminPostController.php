<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'category_id' => ['required', Rule::exists('categories','id')],
            'excerpt' => 'required'
        ]);

        $post->update($attributes);

        return back()->with('message','post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('message','post deleted!');
    }
}
