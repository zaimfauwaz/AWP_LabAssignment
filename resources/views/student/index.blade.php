@extends('layouts.indexform')
@section('title', 'Student Index Page')
@section('header')
    <h1>Student Index Page</h1>
@endsection
@section('createpart')
    <div class="mb-3">
        <a href="{{ route('student.create') }}" class="btn btn-success">Create</a>
    </div>
@endsection
@section('column')
    <th>Student ID</th>
    <th>Student Name</th>
    <th>Student Email</th>
    <th>Student Phone Number</th>
    <th>Student Course</th>
    <th>Student Intake</th>
    <th>Actions</th>
@endsection
@section('data')
    @foreach($students as $student)
    <tr>
            <td>{{ $student->studentId }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->intake }}</td>
            <td>
                <a href="{{ route('student.show', $student->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
@section('pagination')
    <div class="mt-3">
        {{ $students->links() }}
    </div>
@endsection