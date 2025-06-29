<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    use AuthorizesRequests;
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function dashboard()
    {
        $data = $this->postService->getDashboardData();
        return view('admin.admindashboard', $data);
    }

    public function index()
    {
        $posts = $this->postService->getUserPosts(auth()->id());
        return view('admin.dashboard.posts.index', ['post' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.dashboard.posts.createpost', ['categories' => $categories]);
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->storePost($request);
        return redirect('/dashboard/posts')->with('success', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('admin.dashboard.posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('admin.dashboard.posts.editpost', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $this->postService->updatePost($request, $post);
        return redirect('/dashboard')->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);
        return redirect('/dashboard')->with('success', 'Post berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
