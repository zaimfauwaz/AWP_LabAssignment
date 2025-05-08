@extends('layouts.showform')
@include('layouts.navbar')
@section('title', 'Lecturer Data Edit Page')
@section('nav-title', 'Lecturer Data Editor')

@section('content')

        <form action="{{ route('lecturer.update', $lecturer->staff_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="staff_id" class="form-label">Lecturer Staff ID</label>
                <input type="text" class="form-control" name="staff_id" id="staff_id" value="{{ $lecturer->staff_id }}" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Lecturer Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $lecturer->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Lecturer Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $lecturer->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Lecturer Phone No</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone', $lecturer->phone) }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" name="department" id="department" value="{{ old('department', $lecturer->department) }}" required>
                @error('department')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('lecturer.index')}}" class="btn btn-warning">Cancel Edit</a>
        </form>

@endsection