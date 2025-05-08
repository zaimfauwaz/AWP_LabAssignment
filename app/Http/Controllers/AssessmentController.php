<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    private $isLecturer = false;
    private $studentId = null;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check()) {
                abort(403, 'Access denied. Please login first.');
            }

            $this->isLecturer = auth()->user()->access_level == 3;
            
            if (!$this->isLecturer) {
                $student = Student::where('user_id', auth()->id())->first();
                $this->studentId = $student ? $student->student_id : null;
            }

            if (!$this->isLecturer && $request->route()->getName() !== 'assessment.index' && 
                $request->route()->getName() !== 'assessment.show') {
                abort(403, 'Access denied. You do not have permission to perform this action.');
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Assessment::with(['student', 'subject']);
        
        if (!$this->isLecturer) {
            $query->where('student_id', $this->studentId);
        }

        $assessments = $query->paginate(10);
        return view('assessment.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!$this->isLecturer) {
            abort(403, 'Access denied. Only lecturers can create assessments.');
        }

        $students = Student::all();
        $subjects = Subject::all();
        return view('assessment.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$this->isLecturer) {
            abort(403, 'Access denied. Only lecturers can create assessments.');
        }

        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'type' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
            'assessment_date' => 'required|date'
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
        
        if (!$this->isLecturer && $assessment->student_id !== $this->studentId) {
            abort(403, 'Access denied. You can only view your own assessments.');
        }
        
        return view('assessment.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$this->isLecturer) {
            abort(403, 'Access denied. Only lecturers can edit assessments.');
        }

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
        if (!$this->isLecturer) {
            abort(403, 'Access denied. Only lecturers can update assessments.');
        }

        $assessment = Assessment::where('assessment_id', $id)->firstOrFail();

        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'subject_id' => 'required|exists:subjects,subject_id',
            'type' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
            'assessment_date' => 'required|date'
        ]);

        $assessment->update($request->all());
        return redirect()->route('assessment.index')->with('success', 'Assessment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->isLecturer) {
            abort(403, 'Access denied. Only lecturers can delete assessments.');
        }

        $assessment = Assessment::where('assessment_id', $id)->firstOrFail();
        $assessment->delete();
        return redirect()->route('assessment.index')->with('success', 'Assessment deleted successfully.');
    }
}
