<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.teachers.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|image|max:2048',
            'nip' => 'required',
            'role' => 'required',
        ]);

        $validatedData['profile'] = $request->file('image')->store('teachers', 'public');
        $validatedData['role_id'] = $request->input('role');

        Teacher::create($validatedData);

        return redirect()->route('teachers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $roles = Role::all();
        return view('dashboard.teachers.edit', compact('teacher', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'image|max:2048',
            'nip' => 'required',
            'role' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('teachers', 'public');
        }

        $validatedData['role_id'] = $request->input('role');

        $teacher->update($validatedData);

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}
