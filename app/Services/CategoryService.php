<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryService
{
    public function getAllWithPostCount()
    {
        return Category::withCount('posts')->get();
    }

    public function getAll()
    {
        return Category::all();
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public function delete(Category $category): void
    {
        $category->posts()->delete();
        $category->delete();
    }

    public function generateSlug(string $name): string
    {
        return SlugService::createSlug(Category::class, 'slug', $name);
    }
}
