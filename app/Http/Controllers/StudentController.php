<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard.students.index');
    }

    public function create()
    {
        return view('dashboard.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'generation' => 'required',
        ]);

        if($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new StudentsImport($request->generation), $file);
        } else {
            $validatedData = $request->validate([
                'name' => 'required',
                'nis' => 'required',
                'nisn' => 'required',
                'gender' => 'required',
                'major' => 'required',
                'generation' => 'required',
            ]);

            Student::create($validatedData);
        }

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('dashboard.students.edit', compact('student'));
    }

    public function update(Student $student, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'gender' => 'required',
            'major' => 'required',
            'generation' => 'required',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
