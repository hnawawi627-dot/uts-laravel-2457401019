<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|max:20|unique:students,nim',
            'name' => 'required|string|max:255',
            'study_program' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gpa' => 'required|numeric|min:0|max:4',
        ]);

        Student::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'study_program' => $request->study_program,
            'birth_date' => $request->birth_date,
            'gpa' => $request->gpa,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nim' => 'required|max:20|unique:students,nim,' . $student->id,
            'name' => 'required|string|max:255',
            'study_program' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gpa' => 'required|numeric|min:0|max:4',
        ]);

        $student->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'study_program' => $request->study_program,
            'birth_date' => $request->birth_date,
            'gpa' => $request->gpa,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}