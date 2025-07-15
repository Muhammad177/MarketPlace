<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comemnts;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;


    protected $fillable = [
        'title',
        'body',
        'slug',
        'image',
        'category_id',
        'user_id'
    ];
    protected $with = ['category', 'author'];
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        // $query->when($filters['search'] ?? false, function($query, $search) use ($filters) {
        //     if ($filters['category'] ?? false) {
        //         return $query->where(function($query) use ($search) {
        //             $query->where('title', 'like', '%' . $search . '%')
        //                   ->orWhere('body', 'like', '%' . $search . '%');
        //         });
        //     } else {
        //         return $query->where('title', 'like', '%' . $search . '%')
        //                     ->orWhere('body', 'like', '%' . $search . '%');
        //     }
        // });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author))
        );
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('author', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getrouteKeyName()
    {
        return 'slug';
    }

    // Relasi dengan komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
