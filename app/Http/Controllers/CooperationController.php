<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cooperations = Cooperation::all();
        return view('dashboard.cooperations.index', compact('cooperations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cooperations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $validatedData['image'] = $request->file('image')->store('cooperations', 'public');

        Cooperation::create($validatedData);

        return redirect()->route('cooperations.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cooperation $cooperation)
    {
        $cooperation->delete();

        return redirect()->route('cooperations.index');
    }
}
