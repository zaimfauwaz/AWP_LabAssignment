@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron text-center bg-light">
                <h1 class="display-4">Welcome to Zaim SCM</h1>
                <p class="lead">Manage your courses, assignments, and academic progress all in one place.</p>
                <hr class="my-4">
            </div>
        </div>
    </div>

    
    <div class="row mt-4">
    @guest
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <p class="card-text">Get started by logging in to your SCM account.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Log into SCM</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <p class="card-text">No account yet? Register now to get start learning.</p>
                    <a href="{{ route('register') }}" class="btn btn-success">Register Account</a>
                </div>
            </div>
        </div>
    @endguest

    @can('manage-students')
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Manager</h5>
                    <p class="card-text">Manage student data, including adding, editing, and deleting student records.</p>
                    <a href="{{ route('student.index') }}" class="btn btn-info">View Student List</a>
                </div>
            </div>
        </div>
    @endcan

    @can('manage-lecturers')
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lecturer Manager</h5>
                    <p class="card-text">Manage lecturer data, including adding, editing, and deleting lecturer records.</p>    
                    <a href="{{ route('lecturer.index') }}" class="btn btn-success">View Lecturer List</a>
                </div>
            </div>
        </div>
    @endcan

    @can('manage-assessments')
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assessment Manager</h5>
                    <p class="card-text">Manage assessment data, including adding, editing, and deleting assessment records.</p>
                    <a href="{{ route('assessment.index') }}" class="btn btn-info">View Assessment List</a>
                </div>
            </div>
        </div>
    @endcan

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subjects Offered</h5>
                    <p class="card-text">Browse available subjects and course materials.</p>
                    <a href="{{ route('subject.index') }}" class="btn btn-info">View Subjects List</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Announcements</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        Welcome to the new semester! Check your course schedules and assignments.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
