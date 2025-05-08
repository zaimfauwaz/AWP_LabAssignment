@extends('layouts.app')
@section('title', 'Lecturer Data List Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Lecturer Data List</h4>
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
                                    <th>Staff ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lecturers as $lecturer)
                                <tr>
                                    <td>{{ $lecturer->staff_id }}</td>
                                    <td>{{ $lecturer->name }}</td>
                                    <td>{{ $lecturer->email }}</td>
                                    <td>{{ $lecturer->phone }}</td>
                                    <td>{{ $lecturer->department }}</td>
                                    <td>
                                        <a href="{{ route('lecturer.show', $lecturer->staff_id) }}" class="btn btn-info btn-sm mb-2">View</a>
                                        <a href="{{ route('lecturer.edit', $lecturer->staff_id) }}" class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <form action="{{ route('lecturer.destroy', $lecturer->staff_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to delete this lecturer?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $lecturers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection