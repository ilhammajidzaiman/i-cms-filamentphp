<?php

namespace App\Http\Controllers;

use App\Models\Media\File;
use App\Models\Media\Image;
use App\Models\Feature\People;
use App\Models\Media\Carousel;
use App\Models\Feature\Partner;
use App\Models\Feature\Service;
use App\Models\Post\BlogArticle;
use App\Models\Feature\Technology;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['carousel'] = Carousel::show()
            ->orderByDesc('id')
            ->take(10)
            ->latest()
            ->get();
        $data['technology'] = Technology::show()
            ->orderByDesc('id')
            ->take(20)
            ->latest()
            ->get();
        $data['service'] = Service::show()
            ->orderByDesc('id')
            ->take(3)
            ->latest()
            ->get();
        $data['article'] = BlogArticle::show()
            ->orderByDesc('published_at')
            ->take(8)
            ->latest()
            ->get();
        $data['partner'] = Partner::show()
            ->orderByDesc('id')
            ->take(20)
            ->latest()
            ->get();
        $data['people'] = People::show()
            ->orderBy('order')
            ->take(10)
            ->latest()
            ->get();
        $data['file'] = File::show()
            ->orderByDesc('id')
            ->take(6)
            ->latest()
            ->get();
        $data['image'] = Image::show()
            ->orderByDesc('id')
            ->take(6)
            ->latest()
            ->get();
        return view('pages.home.index', $data);
    }
}
