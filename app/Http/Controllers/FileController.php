<?php

namespace App\Http\Controllers;

use App\Models\Media\File;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index()
    {
        return view('pages.file.index');
    }

    public function show(string $id)
    {
        $data['record'] = File::show()
            ->with(['category'])
            ->where('slug', $id)
            ->first();
        $data['other'] = File::show()
            ->inRandomOrder()
            ->take(7)
            ->latest()
            ->get();
        return view('pages.file.show', $data);
    }

    public function update($id)
    {
        $id->increment('downloader');
    }

    public function download($file)
    {
        $url = asset('/storage' . $file);
        $content = @file_get_contents($url);
        if (!$content) :
            abort(404, 'File tidak ditemukan.');
        endif;
        $filename = basename($file);
        $tempPath = storage_path('app/tmp_' . $filename);
        file_put_contents($tempPath, $content);
        return response()
            ->download($tempPath, $filename, [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ])
            ->deleteFileAfterSend(true);
    }
}
