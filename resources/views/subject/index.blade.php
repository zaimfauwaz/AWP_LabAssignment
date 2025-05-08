@extends('layouts.app')
@section('title', 'Subject Data List Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Subject Data List</h4>
                    @can('manage-subjects')
                        <a href="{{ route('subject.create') }}" class="btn btn-success btn-sm">Create New Subject</a>
                    @endcan
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
                                    <th>Subject ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Credit Hours</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->subject_id }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->course }}</td>
                                    <td>{{ $subject->credit_hours }}</td>
                                    <td>
                                        <a href="{{ route('subject.show', $subject->subject_id) }}" class="btn btn-info btn-sm mb-2">View</a>
                                        @can('manage-subjects')
                                            <a href="{{ route('subject.edit', $subject->subject_id) }}" class="btn btn-primary btn-sm mb-2">Edit</a>
                                            <form action="{{ route('subject.destroy', $subject->subject_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection