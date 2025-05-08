@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Assessment Data Viewer Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Assessment Details</h5>
                    <div>
                        @if(Auth::user()->access_level == 3)
                            <a href="{{ route('assessment.edit', $assessment->assessment_id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        @endif
                        <a href="{{ route('assessment.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Assessment ID:</div>
                        <div class="col-md-8">{{ $assessment->assessment_id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Student:</div>
                        <div class="col-md-8">{{ $assessment->student->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Subject:</div>
                        <div class="col-md-8">{{ $assessment->subject->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Type:</div>
                        <div class="col-md-8">{{ $assessment->type }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Score:</div>
                        <div class="col-md-8">
                            Raw Score: {{ number_format($assessment->score, 2) }}
                            <br>
                            Weighted Score: {{ number_format($assessment->score * ($assessment->type === 'Final' ? 0.4 : 0.6), 2) }}
                            <span class="text-muted">
                                (Weight: {{ $assessment->type === 'Final' ? '40%' : '60%' }})
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Date:</div>
                        <div class="col-md-8">{{ $assessment->assessment_date->format('F d, Y') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Created At:</div>
                        <div class="col-md-8">{{ $assessment->created_at->format('F d, Y H:i:s') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Last Updated:</div>
                        <div class="col-md-8">{{ $assessment->updated_at->format('F d, Y H:i:s') }}</div>
                    </div>

                    @if(Auth::user()->access_level == 3)
                        <div class="d-flex justify-content-end mt-4">
                            <form action="{{ route('assessment.destroy', $assessment->assessment_id) }}" 
                                method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this assessment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete Assessment
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
