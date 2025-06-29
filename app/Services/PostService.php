<?php
namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getDashboardData()
    {
        return [
            'postCount' => Post::count(),
            'userCount' => User::count(),
            'topUsers' => User::withCount('posts')
                            ->orderBy('posts_count', 'desc')
                            ->take(3)
                            ->get()
        ];
    }

    public function getUserPosts($userId)
    {
        return Post::where('user_id', $userId)->get();
    }

    public function storePost($request)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('post-images', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 200);

        Post::create($data);
    }

    public function updatePost($request, Post $post)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('post-images');
        }

        $data['user_id'] = $post->user_id;
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 50);

        $post->update($data);
    }

    public function deletePost(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();
    }
}
