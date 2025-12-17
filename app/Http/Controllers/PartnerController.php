<?php

namespace App\Http\Controllers;

use App\Models\Feature\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        return view('pages.partner.index');
    }

    public function show(string $id)
    {
        $data['record'] = Partner::show()
            ->where('slug', $id)
            ->first();
        $data['other'] = Partner::show()
            ->inRandomOrder()
            ->limit(7)
            ->get();
        return view('pages.partner.show', $data);
    }
}
