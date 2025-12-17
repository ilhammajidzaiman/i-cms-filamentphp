<?php

namespace App\Http\Controllers;

use App\Models\Media\File;
use App\Models\Media\FileCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        // $data['record'] = File::show()
        //     ->with(['fileCategory'])
        //     ->orderByDesc('created_at')
        //     ->paginate(15);
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
            ->limit(7)
            ->get();
        return view('pages.file.show', $data);
    }

    public function update($id)
    {
        $id->increment('downloader');
    }
    public function download($file)
    {
        $url = asset('storage/' . $file);
        // $url = env('APP_URL') . '/storage' . $file;
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
    // public function download($id)
    // {
    //     $record = File::show()
    //         ->with(['fileCategory'])
    //         ->where('slug', $id)
    //         ->first();
    //     if ($record->file) :
    //         if (Storage::disk('public')
    //             ->exists($record->file)
    //         ) :
    //             $this->update($record);
    //             return Storage::disk('public')
    //                 ->download($record->file);
    //         endif;
    //     endif;
    // }

    public function category(string $id)
    {
        $data['fileCategory'] = FileCategory::show()
            ->where('slug', $id)
            ->first();
        $data['record'] = File::show()
            ->whereHas('fileCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->paginate(18);
        return view('pages.file.category', $data);
    }

    public function search(string $id)
    {
        $data['keyword'] = $id;
        $data['record'] = File::show()
            ->with(['fileCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('pages.file.search', $data);
    }
}
