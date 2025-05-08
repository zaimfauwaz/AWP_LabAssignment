@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Subject Data Edit Page')
@section('nav-title', 'Subject Data Editor')

@section('content')

        <form action="{{ route('subject.update', $subject->subject_id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject ID</label>
                <input type="text" class="form-control" name="subject_id" id="subject_id" value="{{ $subject->subject_id }}" readonly disabled>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Subject Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $subject->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Subject in Course</label>
                <select id="course" class="form-control @error('course') is-invalid @enderror" name="course" required>
                    <option value="">Select Course</option>
                    @include('layouts.subjects')
                </select>
                @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="credit_hours" class="form-label">Credit Hours</label>
                <input type="number" class="form-control @error('credit_hours') is-invalid @enderror" name="credit_hours" id="credit_hours" value="{{ old('credit_hours', $subject->credit_hours) }}" min="1" max="4" required>
                @error('credit_hours')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('subject.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>
@endsection
