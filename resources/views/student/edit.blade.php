@extends('layouts.showform')
@section('title', 'Student Data Edit Page')
@section('nav-title', 'Student Data Editor')

@section('content')

        <form action="{{ route('student.update', $student->student_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" name="student_id" id="student_id" value="{{ $student->student_id }}" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Student Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone No</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone', $student->phone) }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Course Taken</label>
                <input type="text" class="form-control @error('course') is-invalid @enderror" name="course" id="course" value="{{ old('course', $student->course) }}" required>
                @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="intake" class="form-label">Semester Intake</label>
                <input type="text" class="form-control @error('intake') is-invalid @enderror" name="intake" id="intake" value="{{ old('intake', $student->intake) }}" required>
                @error('intake')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('student.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>

@endsection
