@extends('layouts.showform')
@section('title', 'Lecturer Data Edit Page')
@section('nav-title', 'Lecturer Data Editor')

@section('content')

        <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="staffId" class="form-label">Lecturer Staff ID</label>
                <input type="text" class="form-control" name="staffId" id="staffId" value="{{ $lecturer->staffId }}" >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Lecturer Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $lecturer->name }}" >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Lecturer Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $lecturer->email }}" >
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Lecturer Phone No</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $lecturer->phone }}" >
            </div>
            
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" name="department" id="department" value="{{ $lecturer->department }}" >
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('lecturer.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>

@endsection