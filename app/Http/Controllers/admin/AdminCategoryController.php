<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;


class AdminCategoryController extends Controller
{
   

    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }

    /**
     * Tampilkan semua kategori beserta jumlah post
     */
    public function users(){
        $user = User::all();

        return view('admin.dashboard.users.index', compact('user'));

    }
    public function index()
    {
        $categories = $this->categoryService->getAllWithPostCount();

        return view('admin.dashboard.categories.categoryIndex', compact('categories'));
    }

    /**
     * Tampilkan form buat kategori baru
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();

        return view('admin.dashboard.categories.createcategory', compact('categories'));
    }

    /**
     * Simpan kategori baru
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $this->categoryService->create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category berhasil dibuat!');
    }

    /**
     * Tampilkan detail kategori
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(5);

        return view('admin.dashboard.categories.showcategory', compact('category', 'posts'));
    }

    /**
     * Tampilkan form edit kategori
     */
    public function edit(Category $category)
    {
        return view('admin.dashboard.categories.editcategory', compact('category'));
    }

    /**
     * Update kategori yang ada
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        $validatedData = $request->validated();
        $this->categoryService->update($category, $validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category berhasil diupdate!');
    }

    /**
     * Hapus kategori beserta post terkait
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $this->categoryService->delete($category);

        return redirect('/dashboard/categories')->with('success', 'Category dan semua post-nya berhasil dihapus!');
    }

    /**
     * Generate slug otomatis berdasarkan nama kategori
     */
    public function checkSlug(Request $request)
    {
        $slug = $this->categoryService->generateSlug($request->name);

        return response()->json(['slug' => $slug]);
    }
}
