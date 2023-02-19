<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Category\CreateCategoryRequest;
use App\Http\Requests\Blog\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::filter()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(CreateCategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('categories.create')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('categories.index')->with("success", " با موفقیت اضافه شد.{$category->name} دسته بندی ");
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all()->except($category->id)
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
        } catch (\Exception $exception) {
            return redirect()->route('categories.edit', $category->id)->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('categories.edit', $category)->with(['editMessage' => 'ویرایش با موفقیت انجام شد.']);
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $exception) {
            return redirect()->route('categories.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()->route('categories.index')->with(['deleteCategory' => 'دسته بندی مورد نظر حذف شد.']);
    }
}
