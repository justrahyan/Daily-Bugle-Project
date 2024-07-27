<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use App\Models\Category;
use App\Models\Region;

class HomeController extends Controller
{
    public function index(){
        $news = News::with(['category', 'region'])->latest()->get();
        
        $featureCategory = Category::where('name', 'edukasi')->first();
        $komunitasCategory = Category::where('name', 'komunitas')->first();
        $opiniCategory = Category::where('name', 'opini')->first();
        
        $editorChoiceMain = $featureCategory ? News::where('category_id', $featureCategory->id)->latest()->first() : null;
        $editorChoiceNews = $featureCategory ? News::where('category_id', $featureCategory->id)->latest()->take(5)->get() : collect();
        
        $komunitasMain = $komunitasCategory ? News::where('category_id', $komunitasCategory->id)->latest()->first() : null;
        $komunitasNews = $komunitasCategory ? News::where('category_id', $komunitasCategory->id)->latest()->take(5)->get() : collect();
        
        $opiniMain = $opiniCategory ? News::where('category_id', $opiniCategory->id)->latest()->first() : null;
        $opiniNews = $opiniCategory ? News::where('category_id', $opiniCategory->id)->latest()->take(5)->get() : collect();
        
        $perPage = 6;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
    
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $regions = Region::all();
    
        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'regions', 'editorChoiceMain', 'editorChoiceNews', 'komunitasMain', 'komunitasNews', 'opiniMain', 'opiniNews'));
    }


    public function category($category)
    {
        $categoryModel = Category::where('name', $category)->firstOrFail();
        $paginatedNews = News::where('category_id', $categoryModel->id)->latest()->paginate(6);
        
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $regions = Region::all();
    
        return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories', 'regions'));
    }
    

    public function region($region)
    {
        $regionModel = Region::whereRaw('LOWER(name) = ?', [strtolower($region)])->firstOrFail();
        $paginatedNews = News::where('region_id', $regionModel->id)->latest()->paginate(6);

        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $regions = Region::all();

        return view('user.region', compact('region', 'paginatedNews', 'popularNews', 'categories', 'regions'));
    }

    public function detail($id)
    {
        $newsItem = News::with(['category', 'region'])->findOrFail($id);
        $popularNews = News::with('category')->orderBy('views', 'desc')->take(5)->get();
        $categories = Category::all();
        $regions = Region::all();
        $relatedNews = News::where('category_id', $newsItem->category_id)->where('id', '!=', $id)->take(3)->get();

        return view('user.detail', compact('newsItem', 'popularNews', 'categories', 'regions', 'relatedNews'));
    }
}
