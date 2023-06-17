<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row[0])) {
            return new User([
                "name" => $row[0],
                "email" => $row[1],
                "password" => Hash::make($row[2]),
                "city" => $row[3],
                "role" => $row[4],
                "image" => $row[5],
                "cv" => $row[6],
            ]);
        }

        // Return null if the 'name' value is empty
        return null;
    }

}
