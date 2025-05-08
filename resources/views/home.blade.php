@extends('layouts.app')

@section('content')
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->access_level == 9)
                        {{ __('Welcome Administrator! You are logged in.') }}
                    @elseif(Auth::user()->access_level == 3)
                        {{ __('Welcome Lecturer! You are logged in.') }}
                    @elseif(Auth::user()->access_level == 7)
                        {{ __('Welcome Student! You are logged in.') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Getting Started') }}</div>
                <div class="card-body">
                    @can('manage-students')
                        <div class="mb-3 d-flex align-items-center">
                            <a href="{{ route('student.index') }}" class="btn btn-primary me-3">Student Manager</a>
                            <p class="mb-0">Manage student data, including adding, editing, and deleting student records.</p>
                        </div>
                    @endcan
                    @can('manage-lecturers')
                        <div class="mb-3 d-flex align-items-center">
                            <a href="{{ route('lecturer.index') }}" class="btn btn-primary me-3">Lecturer Manager</a>
                            <p class="mb-0">Manage lecturer data, including adding, editing, and deleting lecturer records.</p>
                        </div>
                    @endcan
                    @can('manage-subjects')
                        <div class="mb-3 d-flex align-items-center">
                            <a href="{{ route('subject.index') }}" class="btn btn-primary me-3">Subject Manager</a>
                            <p class="mb-0">Manage subject data, including adding, editing, and deleting subject records.</p>
                        </div>
                    @endcan
                    @can('manage-assessments')
                        <div class="mb-3 d-flex align-items-center">
                            <a href="{{ route('assessment.index') }}" class="btn btn-primary me-3">Assessment Manager</a>
                            <p class="mb-0">Manage assessment data, including adding, editing, and deleting assessment records.</p>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
