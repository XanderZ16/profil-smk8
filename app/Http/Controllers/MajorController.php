<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return view('majors.index');
    }

    public function ak()
    {
        $galleries = Gallery::where('category', 'ak')->latest()->limit(8)->get();
        $videos = Video::where('category', 'ak')->latest()->limit(8)->get();
        return view('majors.ak', compact('galleries', 'videos'));
    }

    public function fkk()
    {
        $galleries = Gallery::where('category', 'fkk')->latest()->limit(8)->get();
        $videos = Video::where('category', 'fkk')->latest()->limit(8)->get();
        return view('majors.fkk', compact('galleries', 'videos'));
    }

    public function im()
    {
        $galleries = Gallery::where('category', 'im')->latest()->limit(8)->get();
        $videos = Video::where('category', 'im')->latest()->limit(8)->get();
        return view('majors.im', compact('galleries', 'videos'));
    }

    public function tlm()
    {
        $galleries = Gallery::where('category', 'tlm')->latest()->limit(8)->get();
        $videos = Video::where('category', 'tlm')->latest()->limit(8)->get();
        return view('majors.tlm', compact('galleries', 'videos'));
    }

    public function tkj()
    {
        $galleries = Gallery::where('category', 'tkj')->latest()->limit(8)->get();
        $videos = Video::where('category', 'tkj')->latest()->limit(8)->get();
        return view('majors.tkj', compact('galleries', 'videos'));
    }

    public function ps()
    {
        $galleries = Gallery::where('category', 'ps')->latest()->limit(8)->get();
        $videos = Video::where('category', 'ps')->latest()->limit(8)->get();
        return view('majors.ps', compact('galleries', 'videos'));
    }
}
