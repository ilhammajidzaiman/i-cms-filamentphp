<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages.service.index');
    }

    public function show(string $id)
    {
        $data['record'] = Service::show()
            ->where('slug', $id)
            ->first();
        $data['other'] = Service::show()
            ->inRandomOrder()
            ->limit(7)
            ->get();
        return view('pages.service.show', $data);
    }
}
