<?php

namespace App\Http\Controllers;

use App\Models\role;
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
        $this->middleware('auth')->only('goHome');
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
        $roles = role::all();
        return view('roles',['roles'=>$roles] );
    }

    public function goAddRole()
    {
        return view('addRole');
    }

    public function deleteRole($id)
    {
        role::destroy($id);
       return redirect('/roles');
    }



    public function addRole(Request $request)
    {
        $role =  $request->validate([
            'name' => ['required','string','unique:roles'],
        ]);
       role::create($role);
        return redirect('/roles');
    }
}
