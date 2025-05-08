@extends('layouts.app')
@section('title', 'Assessment Data List Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Assessment Data List</h4>
                    @if(Auth::user()->access_level == 3)
                        <a href="{{ route('assessment.create') }}" class="btn btn-success btn-sm">Create New Assessment</a>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Subject</th>
                                    <th>Type</th>
                                    <th>Score</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assessments as $assessment)
                                <tr>
                                    <td>{{ $assessment->assessment_id }}</td>
                                    <td>{{ $assessment->student->name }}</td>
                                    <td>{{ $assessment->subject->name }}</td>
                                    <td>{{ $assessment->type }}</td>
                                    <td>
                                        {{ number_format($assessment->score, 2) }}
                                        <span class="text-muted">
                                            (Weight: {{ $assessment->type === 'Final' ? '40%' : '60%' }})
                                        </span>
                                    </td>
                                    <td>{{ $assessment->assessment_date->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('assessment.show', $assessment->assessment_id) }}" 
                                           class="btn btn-info btn-sm mb-2">View</a>
                                        @if(Auth::user()->access_level == 3)
                                            <a href="{{ route('assessment.edit', $assessment->assessment_id) }}" 
                                               class="btn btn-primary btn-sm mb-2">Edit</a>
                                            <form action="{{ route('assessment.destroy', $assessment->assessment_id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm mb-2" 
                                                        onclick="return confirm('Are you sure you want to delete this assessment?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No assessments found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $assessments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
