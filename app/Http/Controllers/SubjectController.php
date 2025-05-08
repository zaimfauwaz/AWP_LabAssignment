<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
        // $this->middleware('can:manage-subjects'); This method is too simple

        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage-subjects')) {
                abort(403, 'Access denied. You are not authorized to manage subjects.');
            }
            return $next($request);
        })->except(['index', 'show']);
    }

    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|integer|unique:subjects,subject_id',
            'name' => 'required|string|max:255|unique:subjects',
            'course' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1|max:4',
            ]);

        Subject::create($request->all());
        return redirect()->route('subject.index')->with('success', 'New subject is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::where('subject_id', $id)->firstOrFail();
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::where('subject_id', $id)->firstOrFail();
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_id' => 'required|integer|unique:subjects,subject_id,' . $subject->subject_id,
            'name' => 'required|string|max:255|unique:subjects,name,' . $subject->subject_id,
            'course' => 'required|string|max:255',
            'credit_hours' => 'required|integer|min:1|max:4',
        ]);

        $subject->update($request->all());
        return redirect()->route('subject.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Subject deleted successfully.');
    }
}
