<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('isAdmin')->only('goUsers');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function goHome()
    {
        return view('home');
    }

    public function goWelcome()
    {
        return view('welcome');
    }

    public function goProfil()
    {
        return view('profil');
    }

    public function goUsers()
    {
        $users = User::all();
        return view('users',['users'=>$users]);
    }

    public function goRoles()
    {
        return view('roles');
    }

    public function goAddRole()
    {
        return view('addRole');
    }



    public function addRole()
    {

    }



}
