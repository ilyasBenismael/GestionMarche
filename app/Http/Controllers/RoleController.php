<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
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
