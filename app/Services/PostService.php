<?php
namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function getDashboardData(): array
    {
        return [
            'postCount' => Post::count(),
            'userCount' => User::count(),
            'topUsers' => User::withCount('posts')
                              ->orderBy('posts_count', 'desc')
                              ->take(3)
                              ->get(),
        ];
    }

    public function getUserPosts(int $userId)
    {
        return Post::where('user_id', $userId)->get();
    }

    public function storePost(array $data, ?UploadedFile $image = null): Post
    {
        if ($image) {
            $data['image'] = $image->store('post-images', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 200);

        return Post::create($data);
    }

    public function updatePost(array $data, Post $post, ?UploadedFile $image = null): bool
    {
        if ($image) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $image->store('post-images', 'public');
        }

        // Jangan ubah user_id saat update
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 200);

        return $post->update($data);
    }

    public function deletePost(Post $post): bool
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        return $post->delete();
    }
}
