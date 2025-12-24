<?php

namespace App\Http\Controllers;

use App\Models\Post\BlogArticle;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('pages.article.index');
    }

    public function show(string $id)
    {
        $data['record'] = BlogArticle::show()
            ->with(['tags', 'category'])
            ->where('slug', $id)
            ->first();
        $data['other'] = BlogArticle::show()
            ->inRandomOrder()
            ->take(7)
            ->latest()
            ->get();
        return view('pages.article.show', $data);
    }
}
