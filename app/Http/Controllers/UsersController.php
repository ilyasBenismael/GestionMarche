<?php

namespace App\Http\Controllers;


use App\Imports\UsersImport;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function goUsers()
    {
//        $users = new User;
//        $words = request('words');
//        $criteria = request('criteria');
//
//        if ($words != null && trim($words) != "") {
//            if ($criteria == "name") {
//                $users = User::where('name', 'LIKE', '%' . $words . '%')->get();
//            } elseif ($criteria == "city") {
//                $users = User::where('city', 'LIKE', '%' . $words . '%')->get();
//            } elseif ($criteria == "role") {
//                $users = User::where('role', 'LIKE', '%' . $words . '%')->get();
//            }
//        } else {
//            $users = User::all();
//        }
        $users = User::all();
        return response()->view('users', ['users' => $users])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }


    public function goUpdateUser($id)
    {
        $roles = role::all();
        $user = User::find($id);
        $data = [
            'roles' => $roles,
            'user' => $user
        ];
        return response()->view('updateUser', $data)->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }


    public function goChangePassword($id)
    {
        $user = User::find($id);
        return response()->view('ChangePassword', ['user' => $user])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    public function DownloadCv($cv)
    {

        if (File::exists(public_path('files/cvs/' . $cv))) {
            $filePath = 'files/cvs/' . $cv;
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $cv . '"',];
            return response()->download($filePath, $cv, $headers);
        } else {
            return redirect('/users');
        }

    }


    public function updateUser($id, Request $request)
    {
        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'email' => 'required|email|max:50',
            'role' => 'required',
        ]);

        if ($request['image'] !== null) {
            $image_name = time() . '_' . $request['image']->getClientOriginalName();
            $request['image']->move(public_path('files') . '/profils', $image_name);
            $file_patha = public_path('files/profils/'.$user->image);
            if (File::exists($file_patha)) {
                File::delete($file_patha);
            }
        } else {
            $image_name = $user->image;
        }

        if ($request['cv'] !== null) {
            $cv_name = time() . '_' . $request['cv']->getClientOriginalName();
            $request['cv']->move(public_path('files') . '/cvs', $cv_name);

            $file_pathb = public_path('files/cvs/'.$user->cv);
            if (File::exists($file_pathb)) {
                File::delete($file_pathb);
            }
        }else{
            $cv_name = $user->cv;
        }

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'city' => $validatedData['city'],
            'image' => $image_name,
            'cv' => $cv_name,
        ]);

        return redirect('/users');
    }


    public function ChangePassword($id, Request $request)
    {
        $user = User::find($id);
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users');
    }


    public function deleteUser($id)
    {

$user = User::find($id);
        $file_pathb = public_path('files/cvs/'.$user->cv);
        if (File::exists($file_pathb)) {
            File::delete($file_pathb);
        }
        $file_patha = public_path('files/profils/'.$user->image);
        if (File::exists($file_patha)) {
            File::delete($file_patha);
        }
        User::destroy($id);
        return redirect('/users');
    }






    public function ImportUsers(Request $request)
    {
        Excel::import(new UsersImport, $request['excel']);
        return redirect('/users');
}


}
