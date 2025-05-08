<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LecturerController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage-lecturers')) {
                abort(403, 'Access denied. You are not authorized to manage lecturers.');
            }
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::paginate(10);
        return view('lecturer.index', compact('lecturers'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lecturer = Lecturer::where('staff_id', $id)->firstOrFail();
        return view('lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lecturer = Lecturer::where('staff_id', $id)->firstOrFail();
        return view('lecturer.edit', compact('lecturer'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'staff_id' => 'required|integer|unique:lecturers,staff_id,' . $lecturer->staff_id . ',staff_id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lecturers,email,' . $lecturer->staff_id . ',staff_id',
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
