<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:student,lecturer'],
            'access_level' => ['required', 'integer', 'in:3,7'],
            'phone' => ['required', 'string', 'max:20'],
        ];

        // Add student-specific validation rules
        if ($data['role'] === 'student') {
            $rules['course'] = ['required', 'string'];
            $rules['intake'] = ['required', 'string'];
        }

        // Add lecturer-specific validation rules
        if ($data['role'] === 'lecturer') {
            $rules['department'] = ['required', 'string'];
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'access_level' => $data['access_level'],
        ]);

        // Create student or lecturer record based on role
        if ($data['role'] === 'student') {
            Student::create([
                'user_id' => $user->user_id,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'course' => $data['course'],
                'intake' => $data['intake']
            ]);
        } elseif ($data['role'] === 'lecturer') {
            Lecturer::create([
                'user_id' => $user->user_id,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'department' => $data['department']
            ]);
        }
        // Admin users don't need additional records

        return $user;
    }
}
