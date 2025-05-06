@extends('layouts.showform')
@section('title', 'Student Data Create Page')
@section('nav-title', 'Student Data Creator')

@section('content')

        <form action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="studentId" class="form-label">Student ID</label>
                <input type="text" class="form-control" name="studentId" id="studentId" >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Student Email</label>
                <input type="email" class="form-control" name="email" id="email" >
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone No</label>
                <input type="text" class="form-control" name="phone" id="phone" >
            </div>
            
            <div class="mb-3">
                <label for="course" class="form-label">Course Taken</label>
                <input type="text" class="form-control" name="course" id="course" >
            </div>

            <div class="mb-3">
                <label for="intake" class="form-label">Semester Intake</label>
                <input type="text" class="form-control" name="intake" id="intake" >
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>
            <a href="{{ route('student.index')}}" class="btn btn-warning">Cancel Create</a>
        </form>
@endsection