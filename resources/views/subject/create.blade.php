@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Subject Data Create Page')
@section('nav-title', 'Subject Data Creator')

@section('content')

<form action="{{ route('subject.store') }}" method="POST" id="createForm">
    @csrf
    <div class="mb-3">
        <label for="subject_id" class="form-label">Subject ID</label>
        <input type="text" class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" id="subject_id" value="{{ old('subject_id') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        @error('subject_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Subject Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
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
        <input type="number" class="form-control @error('credit_hours') is-invalid @enderror" name="credit_hours" id="credit_hours" value="{{ old('credit_hours') }}" min="1" max="4" required>
        @error('credit_hours')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Add New</button>
    <a href="{{ route('subject.index')}}" class="btn btn-warning">Cancel Edit</a>
</form>

<script>
document.getElementById('createForm').addEventListener('submit', function(e) {
    const subjectId = document.getElementById('subject_id').value;
    if (!/^\d+$/.test(subjectId)) {
        e.preventDefault();
        alert('Subject ID must contain only numbers');
    }
});
</script>

@endsection
