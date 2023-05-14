<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GraphController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function goGraph()
    {
        $roles = role::pluck('name')->toArray();
        $userscount = [];

        foreach ($roles as $role) {
            $count = User::where('role', $role)->count();
            $userscount[] = $count;
        }

        return view('graphs/graph', [
            'roles' => $roles,
            'userscount' => $userscount
        ]);
    }


    public function goAddGraph()
    {
        return view('graphs/addGraph');
    }



    public function addGraph(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file);

        $labels = [];
        $values = [];

        $firstRow = reset($data[0]);

        $columnIndex = array_search('labels', $firstRow);
        if ($columnIndex !== false) {
            $a = 1;
            foreach ($data[0] as $row) {
                if ($a == 1) {
                    $a++;
                } else {
                    $labels[] = $row[$columnIndex] ?? null;
                }
        }}

        $columnIndex = array_search('values', $firstRow);
        if ($columnIndex !== false) {
            $a = 1;
            foreach ($data[0] as $row) {
                if ($a == 1) {
                    $a++;
                } else {
                    $values[] = $row[$columnIndex] ?? null;
                }
            }
        }
        return view('graphs/graph', compact('labels', 'values'));

        }
    }


