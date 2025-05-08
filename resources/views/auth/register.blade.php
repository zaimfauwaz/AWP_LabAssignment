@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Register as') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="student" value="student" checked>
                                    <label class="form-check-label" for="student">
                                        Student
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="lecturer" value="lecturer">
                                    <label class="form-check-label" for="lecturer">
                                        Lecturer
                                    </label>
                                </div>
                                <input type="hidden" name="access_level" value="7" id="access_level">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div id="student-fields" class="row mb-3">
                            <label for="course" class="col-md-4 col-form-label text-md-end">{{ __('Course') }}</label>
                            <div class="col-md-6">
                            <select id="course" class="form-control @error('course') is-invalid @enderror" name="course">
                                <option value="">Select Course</option>

                                @include('layouts.subjects')
                            </select>

                            @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div id="student-intake" class="row mb-3">
                            <label for="intake" class="col-md-4 col-form-label text-md-end">{{ __('Intake (as of 2025)') }}</label>
                            <div class="col-md-6">
                            <select id="intake" class="form-control @error('intake') is-invalid @enderror" name="intake">
                                <option value="">Select Intake</option>

                                <!-- Regular semesters -->
                                <option value="Semester 1">Semester 1 - Jan/Feb Intake</option>
                                <option value="Semester 2">Semester 2 - May/Jun Intake</option>

                                <!-- Optional short / mid‑year semester -->
                                <option value="Short Semester">Short Semester - Aug/Sep Intake</option>
                            </select>
                            @error('intake')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div id="lecturer-fields" class="row mb-3" style="display: none;">
                            <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                            <div class="col-md-6">
                            <select id="department" class="form-control @error('department') is-invalid @enderror" name="department">
                                <option value="">Select Department / Faculty</option>

                                @include('layouts.faculties')
                            </select>

                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <script>
                            document.querySelectorAll('input[name="role"]').forEach((radio) => {
                                radio.addEventListener('change', (e) => {
                                    const accessLevel = e.target.value === 'lecturer' ? '3' : '7';
                                    document.getElementById('access_level').value = accessLevel;
                                    
                                    const studentFields = document.getElementById('student-fields');
                                    const studentIntake = document.getElementById('student-intake');
                                    const lecturerFields = document.getElementById('lecturer-fields');
                                    
                                    if (e.target.value === 'lecturer') {
                                        studentFields.style.display = 'none';
                                        studentIntake.style.display = 'none';
                                        lecturerFields.style.display = 'flex';
                                    } else {
                                        studentFields.style.display = 'flex';
                                        studentIntake.style.display = 'flex';
                                        lecturerFields.style.display = 'none';
                                    }
                                });
                            });
                        </script>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleInputs = document.querySelectorAll('input[name="role"]');
    const accessLevelInput = document.getElementById('access_level');
    const emailInput = document.getElementById('email');

    // Function to validate and modify email for students
    function validateAndModifyEmail() {
        const isStudent = document.getElementById('student').checked;
        const email = emailInput.value;
        
        if (isStudent && email) {
            const parts = email.split('@');
            if (parts.length === 2) {
                const domain = parts[1];
                // Only check if domain is exactly fgo.net
                if (domain === 'fgo.net') {
                    // Add 'student' before the domain
                    emailInput.value = parts[0] + '@student.fgo.net';
                }
            }
        }
    }

    // Add event listeners
    roleInputs.forEach(input => {
        input.addEventListener('change', function() {
            switch(this.value) {
                case 'student':
                    accessLevelInput.value = '7';
                    validateAndModifyEmail();
                    break;
                case 'lecturer':
                    accessLevelInput.value = '3';
                    break;
            }
        });
    });

    // Add event listener for email input
    emailInput.addEventListener('blur', validateAndModifyEmail);
});
</script>
@endpush
