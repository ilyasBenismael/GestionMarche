<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::USERS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('isAdmin');

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
            'city' => ['string', 'max:18'],
            'role' => ['required',],
            'image' => ['image','mimes:jpeg,png,jpg,gif',],
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
        $image_name = time() . '_' . $data['image']->getClientOriginalName();
        $data['image']->move(public_path('files').'/profils', $image_name);

        $cv_name = time() . '_' . $data['cv']->getClientOriginalName();
        $data['cv']->move(public_path('files').'/cvs', $cv_name);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'city' => $data['city'],
            'role' => $data['role'],
            'image' => $image_name,
            'cv' => $cv_name,
        ]);
    }

    protected function showRegistrationForm()
    {
        $roles = role::all(); // Retrieve data from database
        return response()->view('auth.register', ['roles' => $roles])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
         // Pass data to view
    }


}
