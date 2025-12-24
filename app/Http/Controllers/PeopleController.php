<?php

namespace App\Http\Controllers;

use App\Models\Feature\People;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index()
    {
        return view('pages.people.index');
    }

    public function show(string $id)
    {
        $data['record'] = People::show()
            ->withOnly(['position'])
            ->where('uuid', $id)
            ->first();
        $data['other'] = People::show()
            ->inRandomOrder()
            ->take(7)
            ->latest()
            ->get();
        return view('pages.people.show', $data);
    }
}
