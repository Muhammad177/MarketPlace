<?php

namespace App\Http\Controllers\post;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    
    public function index()
    {
        $allPostsQuery = Post::with(['category', 'author'])->latest();
    
        // Get 4 latest posts (for carousel)
        $latestPosts = (clone $allPostsQuery)->take(4)->get();
    
        // Get remaining posts, excluding those already in latest
        $excludedIds = $latestPosts->pluck('id');
        $posts = $allPostsQuery->whereNotIn('id', $excludedIds)->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();
    
        // Title logic
        $title = '';
        if (request('category') && request('author')) {
            $category = Category::firstWhere('slug', request('category'));
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $category->name . ' by ' . $author->name;
        } elseif (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        } elseif (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
    
        return view('user.post.post', [
            'title' => 'All post ' . $title,
            'latestPosts' => $latestPosts,
            'posts' => $posts,
            'active' => 'post',
        ]);
    }
    
    
    public function show(Post $post)
{
    $post->load(['comments.author', 'category', 'author']);

    return view('user.post.postdetail', [
        'name' => 'wahyu',
        'email' => 'ahmad',
        'active' => 'post',
        'post' => $post
    ]);
}

}
