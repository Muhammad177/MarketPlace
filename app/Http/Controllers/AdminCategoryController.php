<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('admin');
      
        $categories = Category::all();
        return view('admin.dashboard.categories.categoryIndex', [
            'categories' => $categories,
            'title' => 'Post Of Categories',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.dashboard.categories.createcategory',[
            'categories' => Category::all() 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($data);
    
        return redirect('/dashboard/categories')->with('success', 'Category berhasil dibuat!');
    
    }

    /**
     * Display the specified resource.
     */

    public function show(Category $category)
    {
        return view('admin.dashboard.categories.showcategory', [
            'category' => $category,
            'posts' => $category->posts()->latest()->paginate(5)
        ]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category berhasil dihapus!');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
