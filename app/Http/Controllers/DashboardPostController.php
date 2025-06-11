<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function dashboard()
    {
        $postCount = Post::count();
        $userCount = User::count();
    
        // Ambil Top 3 User berdasarkan jumlah post terbanyak
        $topUsers = User::withCount('posts')
                    ->orderBy('posts_count', 'desc')
                    ->take(3)
                    ->get();
    
        return view('admin.admindashboard', compact('postCount', 'userCount', 'topUsers'));
    }
    
    public function index()
    {
       $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('admin.dashboard.posts.index',[
            'post' => $posts
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dashboard.posts.createpost',[
            'categories' => $categories

        ]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
        ]);
    
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('post-images');
        }
    
        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request['body']), 200);
        Post::create($data);
    
        return redirect('/dashboard/posts')->with('success', 'Post berhasil dibuat!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.dashboard.posts.show',[
            'post' => $post

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.dashboard.posts.editpost',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
       
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',

        ]);
        if ($request->file('image'))
        {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
        }
            $data['image'] = $request->file('image')->store('post-images');
        }
    
        if($request->slug != $post->slug){
            $data['slug'] = $request->slug;
        }


        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request['body'], 50));

        $post->update($data);
        return redirect('/dashboard')->with('success', 'Post berhasil diupdate!');
     
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->destroy($post->id);
        return redirect('/dashboard')->with('success', 'Post berhasil dihapus!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
