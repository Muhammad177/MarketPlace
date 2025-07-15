<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{    use HasFactory;
    protected $guarded = ['id'];
    // Relasi dengan post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi dengan user (komentar ditulis oleh user)
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
