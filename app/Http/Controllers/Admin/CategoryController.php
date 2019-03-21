<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.category.index', ['items' => Category::query()->get()]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function show(Category $category)
    {
        return \Response::json($category);
    }

    public function store()
    {
        $this->validate(request(), [
            'name'  => 'required|unique:categories|max:15|regex:/[-a-z]/',
            'title' => 'required|unique:categories|max:15',
        ]);

        Category::create(request()->all());

        $name = request('name');
        $this->uploadImage($name);

        Cache::forget(Category::CACHE_KEY);

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        $category->update(request()->all());

        $name = request('name');
        $this->uploadImage($name);

        Cache::forget(Category::CACHE_KEY);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        Cache::forget(Category::CACHE_KEY);

        return redirect()->route('category.index');
    }

    private function uploadImage($name)
    {
        $image = request()->file('image');

        if ($image) {
            $imageExt = $image->extension();

            if (in_array($imageExt, Category::ALLOWED_IMAGE_TYPES)) {
                $image->storeAs('public/images/categories', "$name.{$imageExt}");
            }
        }
    }
}
