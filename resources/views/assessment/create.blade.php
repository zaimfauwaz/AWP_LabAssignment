@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Assessment Data Create Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create New Assessment</h5>
                    <a href="{{ route('assessment.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('assessment.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select class="form-select @error('student_id') is-invalid @enderror" 
                                    id="student_id" 
                                    name="student_id" 
                                    required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->student_id }}" 
                                            {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Subject</label>
                            <select class="form-select @error('subject_id') is-invalid @enderror" 
                                    id="subject_id" 
                                    name="subject_id" 
                                    required>
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}"
                                            {{ old('subject_id') == $subject->subject_id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Assessment Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" 
                                    id="type" 
                                    name="type" 
                                    required>
                                <option value="">Select Type</option>
                                <option value="Quiz" {{ old('type') == 'Quiz' ? 'selected' : '' }}>Quiz</option>
                                <option value="Assignment" {{ old('type') == 'Assignment' ? 'selected' : '' }}>Assignment</option>
                                <option value="Midterm" {{ old('type') == 'Midterm' ? 'selected' : '' }}>Midterm</option>
                                <option value="Final" {{ old('type') == 'Final' ? 'selected' : '' }}>Final</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="score" class="form-label">Score</label>
                            <input type="number" 
                                   class="form-control @error('score') is-invalid @enderror" 
                                   id="score" 
                                   name="score" 
                                   value="{{ old('score') }}" 
                                   step="0.01" 
                                   min="0" 
                                   max="100" 
                                   required>
                            @error('score')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="assessment_date" class="form-label">Date</label>
                            <input type="date" 
                                   class="form-control @error('assessment_date') is-invalid @enderror" 
                                   id="assessment_date" 
                                   name="assessment_date" 
                                   value="{{ old('assessment_date') }}" 
                                   required>
                            @error('assessment_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Assessment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection