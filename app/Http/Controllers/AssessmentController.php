<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage-assessments')) {
                abort(403, 'Access denied. You are not authorized to manage assessments.');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::with(['student', 'subject'])->paginate(10);
        return view('assessment.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('assessment.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'type' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
            'date' => 'required|date'
        ]);

        Assessment::create($request->all());
        return redirect()->route('assessment.index')->with('success', 'Assessment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assessment = Assessment::with(['student', 'subject'])->where('assessment_id', $id)->firstOrFail();
        return view('assessment.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assessment = Assessment::where('assessment_id', $id)->firstOrFail();
        $students = Student::all();
        $subjects = Subject::all();
        return view('assessment.edit', compact('assessment', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assessment = Assessment::where('assessment_id', $id)->firstOrFail();

        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'type' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
            'date' => 'required|date'
        ]);

        $assessment->update($request->all());
        return redirect()->route('assessment.index')->with('success', 'Assessment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assessment = Assessment::where('assessment_id', $id)->firstOrFail();
        $assessment->delete();
        return redirect()->route('assessment.index')->with('success', 'Assessment deleted successfully.');
    }
}
