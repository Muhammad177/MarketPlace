<?php

use Dom\Comment;
use App\Models\Category;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\admin\UserController;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use App\Http\Controllers\comment\CommentsController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\DashboardPostController;
use App\Http\Controllers\admin\DashboardShopController;

Route::prefix('/')->group(function () {
    Route::get('wahyu', function () {
        return view('admin.dashboard.posts.wahyu');
    });

    Route::get('', function () {
        return view('user.index.home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    });

    Route::get('home', function () {
        return view('user.index.home', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    })->name('home');
});


// Group routes with 'auth' middleware
Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('/shop', ShopController::class);
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardPostController::class, 'dashboard'])->name('dashboard.index');
        Route::get('/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
        Route::get('/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
        Route::get('/users', [AdminCategoryController::class, 'users']);
        Route::resource('/posts', DashboardPostController::class);
        Route::resource('/categories', AdminCategoryController::class)->middleware('role');
        Route::resource('/shops', DashboardShopController::class);
        
    });
    Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::resource('/coments', CommentsController::class);
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