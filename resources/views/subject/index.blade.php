@extends('layouts.indexform')
@section('title', 'Subject Index Page')
@section('header')
    <h1>Subject Index Page</h1>
@endsection
@section('createpart')
    <div class="mb-3">
        <a href="{{ route('subject.create') }}" class="btn btn-success">Create</a>
    </div>
@endsection
@section('column')
    <th>Subject ID</th>
    <th>Subject Name</th>
    <th>Subject in Course?</th>
    <th>Subject Credit Hours</th>
    <th>Actions</th>
@endsection
@section('data')
    @foreach($subjects as $subject)
    <tr>
            <td>{{ $subject->subjectId }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->course }}</td>
            <td>{{ $subject->creditHours }}</td>
            <td>
                <a href="{{ route('subject.show', $subject->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline;">
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
        {{ $subjects->links() }}
    </div>
@endsection