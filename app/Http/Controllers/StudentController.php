<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage-students')) {
                abort(403, 'Access denied. You are not authorized to manage students.');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('student.index', compact('students'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::where('student_id', $id)->firstOrFail();
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::where('student_id', $id)->firstOrFail();
        return view('student.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_id' => 'required|integer|unique:students,student_id,' . $student->student_id . ',student_id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->student_id . ',student_id',
            'phone' => 'required|string|min:10|max:15',
            'course' => 'required|string|max:255',
            'intake' => 'required|string|max:255',
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Student details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
