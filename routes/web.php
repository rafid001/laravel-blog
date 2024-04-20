<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategories' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('authors/{author:username}', function(User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});

