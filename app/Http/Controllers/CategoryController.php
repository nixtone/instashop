<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Option;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->withTrashed()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $options = Option::all();
        return view('admin.category.create', compact('categories', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);
        $category->options()->sync($request->input('options', []));
        // $category->uploadFile($validated); // TODO: Добавление превью
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        $options = Option::all();
        return view('admin.category.edit', compact('category', 'categories', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
        $category->options()->sync($request->input('options', []));
        // $category->uploadFile($validated); // TODO: Добавление превью
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function destroyForce(Category $category)
    {
        $category->forceDelete();
        $category->deleteFile();
        return redirect()->route('admin.category.index');
    }


    public function restore($id) {
        $category = Category::withTrashed()->find($id);
        $category->restore();
        return redirect()->route('admin.category.index');
    }
}
