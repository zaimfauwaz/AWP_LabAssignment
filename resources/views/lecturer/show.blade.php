@extends('layouts.showform')
@section('title', 'Lecturer Data Viewer Page')
@include('layouts.navbar')
@section('nav-title', 'Lecturer Data Viewer')

@section('content')

        <div class="mb-3">
            <label for="staffId" class="form-label">Lecturer Staff ID</label>
            <input type="text" class="form-control" name="staffId" id="staffId" value="{{ $lecturer->staff_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="lecturerName" class="form-label">Lecturer Name</label>
            <input type="text" class="form-control" name="lecturerName" id="lecturerName" value="{{ $lecturer->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="lecturerEmail" class="form-label">Lecturer Email</label>
            <input type="email" class="form-control" name="lecturerEmail" id="lecturerEmail" value="{{ $lecturer->email }}" readonly>
        </div>

        <div class="mb-3">
            <label for="lecturerPhone" class="form-label">Lecturer Phone No</label>
            <input type="text" class="form-control" name="lecturerPhone" id="lecturerPhone" value="{{ $lecturer->phone }}" readonly>
        </div>
        
        <div class="mb-3">
            <label for="lecturerDepartment" class="form-label">Department</label>
            <input type="text" class="form-control" name="lecturerDepartment" id="lecturerDepartment" value="{{ $lecturer->department }}" readonly>
        </div>

        <a href="{{ route('lecturer.index')}}" class="btn btn-info">Return</a>

@endsection