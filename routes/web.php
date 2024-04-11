<?php

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function($id) {
    return view('post', [
        'post' => Post::findorfail($id)
    ]);
});

Route::get('categories/{category}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
