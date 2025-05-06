<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::paginate(10);
        return view('lecturer.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'staffId' => 'required|integer|unique:lecturers,staffId',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lecturers',
            'phone' => 'required|string|min:10|max:15',
            'department' => 'required|string|max:255',
        ]);

        Lecturer::create($request->all());

        return redirect()->route('lecturer.index')->with('success', 'New lecturer is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.edit', compact('lecturer'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'staffId' => 'required|integer|unique:lecturers,staffId,' . $lecturer->id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lecturers,email,' . $lecturer->id,
            'phone' => 'required|string|min:10|max:15',
            'department' => 'required|string|max:255',
        ]);

        $lecturer->update($request->all());

        return redirect()->route('lecturer.index')->with('success', 'Lecturer details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();

        return redirect()->route('lecturer.index')->with('success', 'Lecturer deleted successfully.');
    }
}
