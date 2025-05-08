@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Student Data Viewer Page')
@section('nav-title', 'Student Data Viewer')

@section('content')
        <div class="mb-3">
            <label for="studentId" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="studentId" id="studentId" value="{{ $student->student_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" name="studentName" id="studentName" value="{{ $student->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="studentEmail" class="form-label">Student Email</label>
            <input type="email" class="form-control" name="studentEmail" id="studentEmail" value="{{ $student->email }}" readonly>
        </div>

        <div class="mb-3">
            <label for="studentPhone" class="form-label">Student Phone No</label>
            <input type="text" class="form-control" name="studentPhone" id="studentPhone" value="{{ $student->phone }}" readonly>
        </div>
        
        <div class="mb-3">
            <label for="studentCourse" class="form-label">Course Taken</label>
            <input type="text" class="form-control" name="studentCourse" id="studentCourse" value="{{ $student->course }}" readonly>
        </div>

        <div class="mb-3">
            <label for="studentIntake" class="form-label">Semester Intake</label>
            <input type="text" class="form-control" name="studentIntake" id="studentIntake" value="{{ $student->intake }}" readonly>
        </div>

        <a href="{{ route('student.index')}}" class="btn btn-info">Return</a>

@endsection