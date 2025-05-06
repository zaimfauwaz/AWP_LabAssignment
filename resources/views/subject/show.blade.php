@extends('layouts.showform')
@section('title', 'Subject Data Viewer Page')
@section('nav-title', 'Subject Data Viewer')

@section('content')

        <div class="mb-3">
            <label for="subjectId" class="form-label">Subject ID</label>
            <input type="text" class="form-control" name="subjectId" id="subjectId" value="{{ $subject->subjectId }}" readonly>
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
            <label for="subjectCreditHours" class="form-label">Total Credit Hours</label>
            <input type="text" class="form-control" name="subjectCreditHours" id="subjectCreditHours" value="{{ $subject->creditHours }}" readonly>
        </div>
        

        <a href="{{ route('subject.index')}}" class="btn btn-info">Return</a>

@endsection