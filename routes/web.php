<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\SessionFactoryInterface;

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
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/sessions', [SessionController::class, 'store']);

