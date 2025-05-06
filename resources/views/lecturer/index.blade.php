@extends('layouts.indexform')
@section('title', 'Lecturer Index Page')
@section('header')
    <h1>lecturer Index Page</h1>
@endsection
@section('createpart')
    <div class="mb-3">
        <a href="{{ route('lecturer.create') }}" class="btn btn-success">Create</a>
    </div>
@endsection
@section('column')
    <th>Lecturer ID</th>
    <th>Lecturer Name</th>
    <th>Lecturer Email</th>
    <th>Lecturer Phone Number</th>
    <th>Lecturer Department</th>
    <th>Actions</th>
@endsection
@section('data')
    @foreach($lecturers as $lecturer)
    <tr>
            <td>{{ $lecturer->staffId }}</td>
            <td>{{ $lecturer->name }}</td>
            <td>{{ $lecturer->email }}</td>
            <td>{{ $lecturer->phone }}</td>
            <td>{{ $lecturer->department }}</td>
            <td>
                <a href="{{ route('lecturer.show', $lecturer->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('lecturer.edit', $lecturer->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('lecturer.destroy', $lecturer->id) }}" method="POST" style="display:inline;">
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
        {{ $lecturers->links() }}
    </div>
@endsection