<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'subjectId' => 'required|integer|unique:subjects,subjectId',
            'name' => 'required|string|max:255|unique:subjects',
            'course' => 'required|string|max:255',
            'creditHours' => 'required|integer|min:1|max:4',
            ]);

        Subject::create($request->all());
        return redirect()->route('subject.index')->with('success', 'New subject is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subjectId' => 'required|integer|unique:subjects,subjectId,' . $subject->id,
            'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id,
            'course' => 'required|string|max:255',
            'creditHours' => 'required|integer|min:1|max:4',
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
