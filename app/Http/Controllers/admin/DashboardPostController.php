<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\Post\StorePostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{

    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Tampilkan data utama dashboard admin
     */
    public function dashboard()
    {
        $data = $this->postService->getDashboardData();
        return view('admin.admindashboard', $data);
    }

    /**
     * Tampilkan list post milik user
     */
    public function index()
    {
        $posts = $this->postService->getUserPosts(auth()->id());
        return view('admin.dashboard.posts.index',[
            'post' => $posts
        ]);
    }

    /**
     * Tampilkan form create post
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dashboard.posts.createpost', compact('categories'));
    }

    /**
     * Simpan post baru
     */
    public function store(StorePostRequest $request)
    {
        // Ambil data validasi
        $validatedData = $request->validated();

        // Ambil file image, kalau ada
        $image = $request->file('image');

        // Kirim ke service, sudah pakai data validated dan image terpisah
        $this->postService->storePost($validatedData, $image);

        return redirect('/dashboard/posts')->with('success', 'Post berhasil dibuat!');
    }

    /**
     * Tampilkan detail post
     */
    public function show(Post $post)
    {
        return view('admin.dashboard.posts.show', compact('post'));
    }

    /**
     * Tampilkan form edit post
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.dashboard.posts.editpost', compact('post', 'categories'));
    }

    /**
     * Update post yang sudah ada
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        // Ambil data validasi
        $validatedData = $request->validated();

        // Ambil file image, jika ada
        $image = $request->file('image');

        // Kirim ke service
        $this->postService->updatePost($validatedData, $post, $image);

        return redirect('/dashboard')->with('success', 'Post berhasil diupdate!');
    }

    /**
     * Hapus post
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $this->postService->deletePost($post);

        return redirect('/dashboard')->with('success', 'Post berhasil dihapus!');
    }

    /**
     * Generate slug otomatis berdasarkan judul
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
