<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
            'content' => 'required',
            'category' => 'required',
        ]);

        if ($request->category == "news") {
            $validatedData['image'] = $request->file('image')->store('news', 'public');
        } else {
            $validatedData['image'] = $request->file('image')->store('activities', 'public');
        }

        News::create($validatedData);

        return redirect()->route('news.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|max:2048',
            'content' => 'required',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($request->category == "news") {
                $validatedData['image'] = $request->file('image')->store('news', 'public');
            } else {
                $validatedData['image'] = $request->file('image')->store('activities', 'public');
            }
        }

        $news->update($validatedData);

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
