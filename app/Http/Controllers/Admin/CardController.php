<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Card;
use App\Category;
use Illuminate\Support\Facades\Cache;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Card::query()->latest()->get();

        return view('admin.card.index', ['categories' => $this->getCategories(), 'items' => $items]);
    }

    public function create()
    {
        return view('admin.card.create', ['categories' => $this->getCategories()]);
    }

    public function show(Card $card)
    {
        return \Response::json($card);
    }

    public function store()
    {
        $this->validate(request(), [
            'category_id'  => 'required|regex:/[1-9]/',
            'name'  => 'required|unique:cards|max:15|regex:/[-a-z]/',
            'title' => 'required|unique:cards|max:15',
        ]);

        Card::create(request()->all());

        $name = request('name');
        $this->uploadImage($name);
        $this->uploadSound($name);

        Cache::forget(Card::CACHE_PREFIX . request('category_id'));

        return redirect()->route('card.index');
    }

    public function edit(Card $card)
    {
        return view('admin.card.edit', ['card' => $card, 'categories' => $this->getCategories()]);
    }

    public function update(Card $card)
    {
        $card->update(request()->all());

        $name = request('name');
        $this->uploadImage($name);
        $this->uploadSound($name);

        Cache::forget(Card::CACHE_PREFIX . $card['category_id']);

        return redirect()->route('card.index');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        Cache::forget(Card::CACHE_PREFIX . $card['category_id']);

        return redirect()->route('card.index');
    }

    private function uploadImage($name)
    {
        $image = request()->file('image');

        if ($image) {
            $imageExt = $image->extension();

            if (in_array($imageExt, Card::ALLOWED_IMAGE_TYPES)) {
                $image->storeAs('public/images/cards', "$name.{$imageExt}");
            }
        }
    }

    private function uploadSound($name)
    {
        $sound = request()->file('sound');

        if ($sound) {
            $soundExt = $sound->extension();

            if (in_array($soundExt, Card::ALLOWED_SOUND_TYPES)) {
                $sound->storeAs('public/sounds', "$name.{$soundExt}");
            }
        }
    }

    private function getCategories()
    {
        $categories = Category::all();

        $result = [Category::DEFAULT_VALUE];

        foreach ($categories as $category) {
            $result[$category->id] = $category->title;
        }

        return $result;
    }
}
