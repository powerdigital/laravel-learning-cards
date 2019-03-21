<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Cache::rememberForever('categories', function () {
            return Category::query()->get();
        });

        return view('frontend.category.index', ['categories' => $categories]);
    }
}
