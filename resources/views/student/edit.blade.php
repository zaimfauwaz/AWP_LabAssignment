@extends('layouts.showform')
@section('title', 'Student Data Edit Page')
@section('nav-title', 'Student Data Editor')

@section('content')

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" name="studentId" id="studentId" value="{{ $student->studentId }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Student Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone No</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $student->phone }}">
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course Taken</label>
                <input type="text" class="form-control" name="course" id="course" value="{{ $student->course }}">
            </div>

            <div class="mb-3">
                <label for="intake" class="form-label">Semester Intake</label>
                <input type="text" class="form-control" name="intake" id="intake" value="{{ $student->intake }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('student.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>

@endsection
