@extends('layouts.showform')
@section('title', 'Lecturer Data Create Page')
@section('nav-title', 'Lecturer Data Creator')

@section('content')

    <form action="{{ route('lecturer.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="staffId" class="form-label">Lecturer Staff ID</label>
            <input type="text" class="form-control" name="staffId" id="staffId">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Lecturer Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Lecturer Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Lecturer Phone No</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" name="department" id="department">
        </div>

        <button type="submit" class="btn btn-primary">Add New</button>
        <a href="{{ route('lecturer.index')}}" class="btn btn-warning">Cancel Create</a>
    </form>

@endsection
