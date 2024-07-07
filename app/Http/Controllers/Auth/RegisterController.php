<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['image'],
            'mybike' => ['required', 'string'],
            'mybike_image' => ['image'],
            'career' => ['required', 'integer'],
            'objective' => ['required', 'string'],
            'introduction' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        if (isset($data['profile_image'])) {
            $profile_image=request()->file('profile_image')->getClientOriginalName();
            request()->file('profile_image')->storeAs('public/image', $profile_image);
        } else {
            $profile_image = null;
        }
        
        if (isset($data['mybike_image'])) {
            $mybike_image=request()->file('mybike_image')->getClientOriginalName();
            request()->file('mybike_image')->storeAs('public/image', $mybike_image);
        } else {
            $mybike_image = null;
        }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => $profile_image,
            'mybike' => $data['mybike'],
            'mybike_image' => $mybike_image,
            'career' => $data['career'],
            'objective' => $data['objective'],
            'introduction' => $data['introduction'],
        ]);
    }
}
