@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Subject Data Viewer Page')
@section('nav-title', 'Subject Data Viewer')

@section('content')

        <div class="mb-3">
            <label for="subjectId" class="form-label">Subject ID</label>
            <input type="text" class="form-control" name="subjectId" id="subjectId" value="{{ $subject->subject_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="subjectName" class="form-label">Subject Name</label>
            <input type="text" class="form-control" name="subjectName" id="subjectName" value="{{ $subject->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="subjectCourse" class="form-label">Subject in Course</label>
            <input type="text" class="form-control" name="subjectCourse" id="subjectCourse" value="{{ $subject->course }}" readonly>
        </div>

        <div class="mb-3">
            <label for="credit_hours" class="form-label">Credit Hours</label>
            <input type="text" class="form-control" name="credit_hours" id="credit_hours" value="{{ $subject->credit_hours }}" readonly>
        </div>
        

        <a href="{{ route('subject.index')}}" class="btn btn-info">Return</a>

@endsection