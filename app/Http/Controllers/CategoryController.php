<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string|max:500',
        ]);

        try {
            Category::create($validated);
            Alert::success('Success', 'Category created successfully.');
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create category: ' . $e->getMessage());
            Alert::error('Error', 'Gagal membuat kategori. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to create category: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
        ]);

        try {
            $category->update($validated);
            Alert::success('Success', 'Category updated successfully.');
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update category: ' . $e->getMessage());
            Alert::error('Error', 'Gagal memperbarui kategori. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to update category: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            Alert::success('Success', 'Category deleted successfully.');
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete category: ' . $e->getMessage());
            Alert::error('Error', 'Gagal menghapus kategori. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}
