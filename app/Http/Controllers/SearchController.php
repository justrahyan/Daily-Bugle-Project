<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // Pastikan model ini ada dan sudah benar
use App\Models\Category;
use App\Models\Region;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $news = News::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])->latest()->paginate(6);
        $categories = Category::all();
        $regions = Region::all();
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();

        return view('user.search', compact('news', 'categories', 'regions','popularNews'));
    }
}

