<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\Video;

class SchoolController extends Controller
{
    public function home()
    {
        $latestNews = News::where('category', 'news')->latest()->limit(5)->get();
        $galleries = Gallery::latest()->limit(3)->get();
        return view('home', compact('latestNews', 'galleries'));
    }

    public function history()
    {
        return view('history');
    }

    public function visimisi()
    {
        return view('visimisi');
    }

    public function kepsek()
    {
        return view('kepsek');
    }

    public function dapo()
    {
        return view('dapo');
    }

    public function cooperations()
    {
        $cooperations = Cooperation::all();
        return view('cooperations', compact('cooperations'));
    }

    public function news()
    {
        $search = request('search');
        $news = News::where('category', 'news')->where('title', 'like', '%' . $search . '%')->latest()->paginate(5);
        $latestActivities = News::where('category', 'activity')->latest()->limit(5)->get();

        return view('news.index', compact('news', 'latestActivities'));
    }

    public function showNews($title)
    {
        $news = News::where('title', $title)->first();
        $news->increment('seen');
        $latestNews = News::where('category', 'news')->latest()->limit(5)->get();
        $latestActivities = News::where('category', 'activity')->latest()->limit(5)->get();
        return view('news.show', compact('news', 'latestNews', 'latestActivities'));
    }

    public function activities()
    {
        $search = request('search');
        $activities = News::where('category', 'activity')->where('title', 'like', '%' . $search . '%')->latest()->paginate(5);
        $latestNews = News::where('category', 'news')->latest()->limit(5)->get();
        return view('activities.index', compact('activities', 'latestNews'));
    }

    public function showActivity($title)
    {
        $activity = News::where('title', $title)->first();
        $activity->increment('seen');
        $latestActivities = News::where('category', 'activity')->latest()->limit(5)->get();
        $latestNews = News::where('category', 'news')->latest()->limit(5)->get();
        return view('activities.show', compact('activity', 'latestActivities', 'latestNews'));
    }

    public function galleries()
    {
        $search = request('search');
        $galleries = Gallery::where('title', 'like', '%' . $search . '%')->latest()->get();
        return view('galleries', compact('galleries'));
    }

    public function videos()
    {
        $search = request('search');
        $videos = Video::where('title', 'like', '%' . $search . '%')->latest()->get();
        return view('videos', compact('videos'));
    }

    public function teachers()
    {
        $roles = Role::with('teachers')->get();

        $search = request('search');
        $teachers = [];
        if ($search) {
            $teachers = Teacher::where('name', 'like', '%' . $search . '%')->get();
        }
        return view('teachers', compact('roles', 'teachers'));
    }
}
