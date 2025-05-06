@extends('layouts.showform')
@section('title', 'Subject Data Edit Page')
@section('nav-title', 'Subject Data Editor')

@section('content')

        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="subjectId" class="form-label">Subject ID</label>
                <input type="text" class="form-control" name="subjectId" id="subjectId" value="{{ $subject->subjectId }}" >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Subject Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $subject->name }}" >
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Subject in Course</label>
                <input type="text" class="form-control" name="course" id="course" value="{{ $subject->course }}" >
            </div>

            <div class="mb-3">
                <label for="creditHours" class="form-label">Total Credit Hours</label>
                <input type="number" class="form-control" name="creditHours" id="creditHours" value="{{ $subject->creditHours }}" min="1" max="4">
            </div>
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('subject.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>
@endsection
