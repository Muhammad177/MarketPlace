<?php

use App\Models\Category;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ComentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

Route::get('/', function () {
    return view('user.index.home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/home', function () {
    return view('user.index.home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
})->name('home');

// Group routes with 'auth' middleware
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardPostController::class, 'dashboard'])->name('dashboard.index');
        Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
        Route::get('/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
        Route::resource('/posts', DashboardPostController::class);
        Route::resource('/categories', AdminCategoryController::class)->middleware('role');

        
    });
    Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::resource('/coments', ComentsController::class);
    });
     Route::resource('user', UserController::class)->only(['show', 'edit', 'update']);
});

// Authentication Routes for Guests Only
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});
// Group routes for categories
Route::prefix('categories')->group(function () {
    Route::get('/', function () {
        return view('user.category.categories', [
            'name' => 'ahmad',
            'title' => 'Post Of Categories',
            'categories' => Category::all(),
            'active' => 'categories'
        ]);
    })->name('categories');

    Route::get('/{category:slug}', function (Category $category) {
        return view('user.category.category', [
            'name' => 'agashi',
            'posts' => $category->posts->load('author', 'category'),
            'category' => $category->name,
            'active' => 'categories'
        ]);
    });
});

Route::get('/about', function () {
    return view('user.index.about', [
        'title' => 'About',
        'active' => 'about'
    ]);
});