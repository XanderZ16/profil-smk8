<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.videos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'category' => 'required',
        ]);

        $validatedData['url'] = $this->convertToEmbedUrl($validatedData['url']);

        Video::create($validatedData);

        return redirect()->route('videos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('dashboard.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);


        $video->update($validatedData);

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }

    function convertToEmbedUrl($url)
    {
        // Parse URL untuk mendapatkan komponen
        $parsedUrl = parse_url($url);

        // Periksa domain
        if (isset($parsedUrl['host'])) {
            // Untuk URL YouTube standar (www.youtube.com atau youtube.com/live)
            if (strpos($parsedUrl['host'], 'youtube.com') !== false) {
                // Jika URL adalah YouTube Live
                if (strpos($parsedUrl['path'], '/live/') !== false) {
                    // Ambil video ID dari path
                    $videoId = trim(str_replace('/live/', '', $parsedUrl['path']), '/');
                    return "https://www.youtube.com/embed/{$videoId}";
                }

                // Jika URL adalah format normal
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $queryParams);
                    if (isset($queryParams['v'])) {
                        $videoId = $queryParams['v'];
                        return "https://www.youtube.com/embed/{$videoId}";
                    }
                }
            }

            // Untuk URL short YouTube (youtu.be)
            if (strpos($parsedUrl['host'], 'youtu.be') !== false) {
                $videoId = trim($parsedUrl['path'], '/');
                return "https://www.youtube.com/embed/{$videoId}";
            }
        }

        // Jika URL tidak dikenali, kembalikan null atau pesan error
        return null;
    }
}
