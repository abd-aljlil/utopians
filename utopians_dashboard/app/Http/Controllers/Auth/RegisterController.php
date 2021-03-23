<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use DB;
use App\Exam_Name_Index_Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\StudentRegistered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;


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
    protected $redirectTo = '/Course_Register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {

        $roles = DB::table('roles')->get();
        return view('auth.register', compact('roles'));
    }

    public function showStudentForm()
    {

        return view('auth.register_student');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name-en'        => 'required|string|max:255',
            'name-ar'        => 'required|string|max:255',
            'gender'         => 'required',
            'birthdate'      => 'required|date',
            'email'          => 'required|string|email|max:255|unique:users',
            'role'           => 'required',
            'password'       => 'required|string|min:6|confirmed',
            'university'     => 'required|string|max:255',
            'specialization' => 'string|max:255',
            'country'        =>'required|string|max:255',
            'city'           => 'required|string|max:255',
            'preferred_time' => 'max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
           Session::flash('success', 'تم تسجيلك بنجاح');
           $user = User::insertGetId([
            'active'         => 0,
            'english_name'   => $data['name-en'],
            'arabic_name'    => $data['name-ar'],
            'gender'         => $data['gender'],
            'birthdate'      => $data['birthdate'],
            'email'          => $data['email'],
            'password'       => Hash::make($data['password']),
         
            'university'     => $data['university'],
            'specialization' => $data['specialization'],
            'country'        => $data['country'],
            'city'           => $data['city'],
            'preferred_time' => $data['preferred_time'],
            'level'          => $data['level'],

            
        ]);

        DB::table('role_user')->insert([
          'user_id' => $user,
          'role_id' => $data['role']
        ]);

  }
}
