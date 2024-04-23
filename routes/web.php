<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminsOnly;
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


Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/sessions', [SessionController::class, 'store']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/admin/post/create', [PostController::class, 'create'])->middleware(['auth', AdminsOnly::class]);
Route::post('/admin/post', [PostController::class, 'store'])->middleware(['auth', AdminsOnly::class]);

Route::get('/admin/post', [AdminPostController::class, 'index'])->middleware(['auth', AdminsOnly::class]);
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('auth', AdminsOnly::class);

Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->middleware(['auth', AdminsOnly::class]);

Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware(['auth',AdminsOnly::class]);