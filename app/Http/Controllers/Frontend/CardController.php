<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Card;
use Illuminate\Support\Facades\Cache;

class CardController extends Controller
{
    public function index(string $categoryId)
    {
        $categoryCacheKey = Category::CACHE_PREFIX . $categoryId;

        $category = Cache::rememberForever($categoryCacheKey, function () use ($categoryId) {
            return Category::where('id', $categoryId)->get()->first->toArray();
        });

        $cardCacheKey = Card::CACHE_PREFIX . $categoryId;

        $cards = Cache::rememberForever($cardCacheKey, function () use($categoryId) {
            return Card::query()->where('category_id', $categoryId)->get();
        });

        return view('frontend.card.index', ['category' => $category['title'], 'items' => $cards]);
    }
}
